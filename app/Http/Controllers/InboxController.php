<?php

namespace App\Http\Controllers;


use App\Admin;
use App\Branch;
use App\User;
use App\Inbox_users;
use App\Units;
use Session;
use App\Banks;
use App\Customers;
use App\Inbox;
use App\Transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InboxController extends Controller
{
    //

    public function g_inbox(){

        $user = Auth::user();
        if(!$user){
            return redirect('betabet/login');
        }

        $name = Customers::where("user_id",$user->id)->first();

        $message =Inbox_users::where('inbox.flag','!=','0')
            ->join('inbox','inbox.id','=','inbox_users.note_id')
            ->where('user_id' ,$user->id)
            ->select('inbox.*','inbox_users.flag as flags','inbox_users.status as status','inbox_users.id as ids')
            ->get();

        return view('betabet/inbox', compact("name",'message'));
    }

    public function p_read_message(Request $request){


        $ids = $request->input('ids');

        $inbox = Inbox_users::findOrFail($ids);

        $inbox->status = 2;

        $inbox->save();

        $user = Auth::user();

        $inboxs = Inbox_users::where('user_id' ,$user->id)
            ->where('flag','!=','0')
            ->where('status',1)
            ->count();

        Session::put( 'inbox', $inboxs );

    }


    public function g_a_inbox($id = null){

        $admin = new Admin;
        $user = Auth::user();
        if(!$user){
            return redirect('admin/login');
        }

        $name = Admin::where("user_id",$user->id)->first();

        $inbox = Inbox::join('admins','admins.user_id','=','inbox.sender')
            ->join('branch','branch.id','=','inbox.branch')
            ->select('inbox.*','branch.name as bname', 'admins.name as aname')
            ->get() ;

        $privillage = Units::where('id',$name->staff_unit_id)
            ->first();

        return view('admin/inbox', compact("name","id", 'inbox','privillage'));
    }

    public function g_a_add_inbox(){

        $admin = new Admin;

        $user = Auth::user();
        if(!$user){
            return redirect('admin/login');
        }

        $name = Admin::where("user_id",$user->id)->first();

        $inbox = Inbox::join('admins','admins.user_id','=','inbox.sender')
            ->get() ;

        $privillage = Units::where('id',$name->staff_unit_id)
            ->first();

        $branches = Branch::where('hierachy', '!=','none')
            ->get();

        return view('admin/add_inbox', compact("name","id", 'inbox','privillage','branches'));
    }

    public function g_a_edit_inbox($id = null){

        $admin = new Admin;

        $user = Auth::user();
        if(!$user){
            return redirect('admin/login');
        }

        $name = Admin::where("user_id",$user->id)->first();

        $inbox = Inbox::join('admins','admins.user_id','=','inbox.sender')
            ->join('branch','inbox.branch','=','branch.id')
            ->where('inbox.id',$id)
            ->first() ;

        //var_dump($inbox); die();

        $privillage = Units::where('id',$name->staff_unit_id)
            ->first();

        $branches = Branch::where('hierachy', '!=','none')
            ->get();

        return view('admin/editinbox', compact("name","id", 'inbox','privillage','branches'));
    }

    public function p_a_add_inbox(){

        $head = request()->head;
        $body = request()->body;
        $branch = request()->branch;

        $user = Auth::user();

        $inbox = new Inbox;

        $inbox->header = $head;
        $inbox->body = $body;
        $inbox->branch = $branch;
        $inbox->flag = 1;
        $inbox->status = 1;
        $inbox->sender = $user->id;

        $inbox->save();

            $access = Branch::where('id',$branch)
                ->first();

            $customers = [];

            if($access->hierachy == 'head office') {

                $customers = Customers::where('customers.flag', '!=', '0')
                    ->join('branch', 'branch.id', '=', 'customers.branch')
                    ->join('users', 'users.id', '=', 'customers.user_id')
                    ->select('customers.*', 'users.username','branch.name')
                    ->where('status', 1)
                    ->get();

            } elseif ($access->hierachy == 'regional office'){

                //get first regional office ** object

                $reg = Branch::where('id',$branch)
                    ->first();

                //Fetch the regional again as an object

                $regional = Branch::where('id',$branch)
                    ->get();

                // fetch all area office having the regional office as parent

                $area = Branch::where('under',$reg->id)
                    ->where('hierachy','area office')
                    ->get() ;

                // fetch all hub2  office having the regional office as parent

                $hub_2 = Branch::where('under',$reg->id)
                    ->where('hierachy','hub 2 office')
                    ->get();

                //assign empty hub1

                $hub_1 =[];

                // fetch all hub 1 office having the area offices under the regional parent

                foreach ($area as $are){

                    $hub = Branch::where('under', $are->id)
                        ->where('hierachy','hub 1 office')
                        ->get();

                    array_push($hub_1 , $hub);
                };

                //assign empty branch
                $branch =[];

                // fetch all branch office having the area offices under the regional parent

                foreach ($area as $are){
                    $bra= Branch::where('under',$are->id)
                        ->where('hierachy','branch office')
                        ->get();

                    array_push($branch, $bra);

                }

                // fetch all branch office having the hub2 offices under the regional parent

                foreach ($hub_2 as $hub_two){

                    $bran = Branch::where('under',$hub_two->id)
                        ->where('hierachy','branch office')
                        ->get();

                    array_push($branch, $bran);

                }

                // fetch all branch office having the hub1  offices under the regional parent by double looping and push them to the branch

                foreach ($hub_1 as $hub_one){

                    foreach ($hub_one as $hub_one_2){

                        $branc = Branch::where('under',$hub_one_2->id)
                            ->where('hierachy','branch office')
                            ->get();

                        array_push($branch, $branc);
                    }

                }

                //people array should be desclared as empty array and the result of regional,branch,hub 1,area,hub 2 assigned to them.

                $people = [];

                array_push($people , $regional , $area, $hub_2);

                foreach ($hub_1 as $hub1){

                    array_push($people , $hub1 );

                }

                foreach ($branch as $bra1){

                    array_push($people , $bra1 );

                }

                //customer is fetched after looping through people array twice

                $customerss = [];

                foreach ( $people as $person ){

                    foreach ($person as $persons){

                        $customer = Customers::where('branch', $persons->id)
                            ->join('users', 'users.id', '=', 'customers.user_id')
                            ->join('branch', 'branch.id', '=', 'customers.branch')
                            ->select('customers.*', 'users.username','branch.name')
                            ->where('status', 1)
                            ->get();

                        array_push($customerss,$customer);

                    }

                }

                // the result is then flattened to get desired result

                $customers = array_flatten($customerss);

            }elseif ($access->hierachy == 'area office'){

                $are = Branch::where('id',$branch)
                    ->first();

                $area = Branch::where('id',$branch)
                    ->get();



                $branches = Branch::where('under',$are->id)
                    ->where('hierachy','branch office')
                    ->get() ;



                $hub_1 = Branch::where('under',$are->id)
                    ->where('hierachy','hub 1 office')
                    ->get() ;



                $branch = [];

                foreach ($hub_1 as $hub){

                    $bra= Branch::where('under',$hub->id)
                        ->where('hierachy','branch office')
                        ->get();

                    array_push($branch, $bra);

                }



                $people = [];

                array_push($people , $area, $branches );

                foreach ($branch as $bra1){

                    array_push($people , $bra1 );

                }

                $customerss =[];

                foreach($people as $person){

                    foreach ($person as $persons){

                        $customer = Customers::where('branch', $persons->id )
                            ->join('users', 'users.id', '=', 'customers.user_id')
                            ->join('branch', 'branch.id', '=', 'customers.branch')
                            ->select('customers.*', 'users.username','branch.name')
                            ->where('status', 1)
                            ->get();

                        array_push($customerss,$customer);

                    }

                }

                $customers = array_flatten($customerss);

            }elseif ($access->hierachy == 'hub 1 office'){

                $hub = Branch::where('id',$branch)
                    ->first();

                $hub_1 = Branch::where('id',$branch)
                    ->get();

                $branches = Branch::where('under',$hub->id)
                    ->where('hierachy','branch office')
                    ->get() ;

                $people=[];

                array_push($people,$hub_1,$branches);

                $customerss =[];

                foreach($people as $person){

                    foreach ($person as $persons){

                        $customer = Customers::where('branch', $persons->id )
                            ->join('users', 'users.id', '=', 'customers.user_id')
                            ->join('branch', 'branch.id', '=', 'customers.branch')
                            ->select('customers.*', 'users.username','branch.name')
                            ->where('status', 1)
                            ->get();

                        array_push($customerss,$customer);

                    }

                }



                $customers = array_flatten($customerss);



            }elseif ($access->hierachy == 'hub 2 office'){

                $hub = Branch::where('id',$branch)
                    ->first();

                $hub_2 = Branch::where('id',$branch)
                    ->get();

                $branches = Branch::where('under',$hub->id)
                    ->where('hierachy','branch office')
                    ->get() ;

                $people=[];

                array_push($people,$hub_2,$branches);

                $customerss =[];

                foreach($people as $person){

                    foreach ($person as $persons){

                        $customer = Customers::where('branch', $persons->id )
                            ->join('users', 'users.id', '=', 'customers.user_id')
                            ->join('branch', 'branch.id', '=', 'customers.branch')
                            ->select('customers.*', 'users.username','branch.name')
                            ->where('status', 1)
                            ->get();

                        array_push($customerss,$customer);

                    }

                }

                $customers = array_flatten($customerss);


            }elseif ($access->hierachy == 'branch office'){

                $branch = Branch::where('id',$branch)
                    ->first();

                $customers = Customers::where('branch', $branch->id )
                    ->join('users', 'users.id', '=', 'customers.user_id')
                    ->join('branch', 'branch.id', '=', 'customers.branch')
                    ->select('customers.*', 'users.username','branch.name')
                    ->where('status', 1)
                    ->get();

            }elseif ($access->hierachy == 'virtual branch'){

                $vir = Branch::where('id',$branch)
                    ->first();

                $customers = Customers::where('branch', $vir->id )
                    ->join('users', 'users.id', '=', 'customers.user_id')
                    ->join('branch', 'branch.id', '=', 'customers.branch')
                    ->select('customers.*', 'users.username','branch.name')
                    ->where('status', 1)
                    ->get();

            }else{

                $customers = [];

            }



            foreach ($customers as $id){

                $inbox_users = new Inbox_users;

                $inbox_users->note_id = $inbox->id ;

                $inbox_users->user_id = $id->user_id;

                $inbox_users->flag = 1;

                $inbox_users->status = 1;

                $inbox_users->save();

            }


            Session::flash('add', 'Congrats! Unit record added');
            return redirect('/admin/inbox');




    }

    public function p_a_delete_inbox(){

        $id = request()->id;

        $inbox = Inbox::findOrFail($id);


        if ($inbox->delete()) {

            Inbox_users::where('note_id', $id)->delete();

        }else{

            Session::flash('error', 'Sorry! Unit cant be deleted try again');
            return redirect('/admin/inbox');

        }

    }

    public function p_a_update_inbox(){

        $head = request()->head;
        $body = request()->body;
        $branch = request()->branch;
        $id = request()->id;

        $user = Auth::user();

        $inbox =  Inbox::find($id);

        $inbox->header = $head;
        $inbox->body = $body;
        $inbox->branch = $branch;
        $inbox->flag = 1;
        $inbox->status = 1;
        $inbox->sender = $user->id;

        if ($inbox->save()) {

           if(Inbox_users::where('note_id', $id)->delete()){


               $access = Branch::where('id',$branch)
                   ->first();

               $customers = [];

               if($access->hierachy == 'head office') {

                   $customers = Customers::where('customers.flag', '!=', '0')
                       ->join('branch', 'branch.id', '=', 'customers.branch')
                       ->join('users', 'users.id', '=', 'customers.user_id')
                       ->select('customers.*', 'users.username','branch.name')
                       ->where('status', 1)
                       ->get();

               } elseif ($access->hierachy == 'regional office'){

                   //get first regional office ** object

                   $reg = Branch::where('id',$branch)
                       ->first();

                   //Fetch the regional again as an object

                   $regional = Branch::where('id',$branch)
                       ->get();

                   // fetch all area office having the regional office as parent

                   $area = Branch::where('under',$reg->id)
                       ->where('hierachy','area office')
                       ->get() ;

                   // fetch all hub2  office having the regional office as parent

                   $hub_2 = Branch::where('under',$reg->id)
                       ->where('hierachy','hub 2 office')
                       ->get();

                   //assign empty hub1

                   $hub_1 =[];

                   // fetch all hub 1 office having the area offices under the regional parent

                   foreach ($area as $are){

                       $hub = Branch::where('under', $are->id)
                           ->where('hierachy','hub 1 office')
                           ->get();

                       array_push($hub_1 , $hub);
                   };

                   //assign empty branch
                   $branch =[];

                   // fetch all branch office having the area offices under the regional parent

                   foreach ($area as $are){
                       $bra= Branch::where('under',$are->id)
                           ->where('hierachy','branch office')
                           ->get();

                       array_push($branch, $bra);

                   }

                   // fetch all branch office having the hub2 offices under the regional parent

                   foreach ($hub_2 as $hub_two){

                       $bran = Branch::where('under',$hub_two->id)
                           ->where('hierachy','branch office')
                           ->get();

                       array_push($branch, $bran);

                   }

                   // fetch all branch office having the hub1  offices under the regional parent by double looping and push them to the branch

                   foreach ($hub_1 as $hub_one){

                       foreach ($hub_one as $hub_one_2){

                           $branc = Branch::where('under',$hub_one_2->id)
                               ->where('hierachy','branch office')
                               ->get();

                           array_push($branch, $branc);
                       }

                   }

                   //people array should be desclared as empty array and the result of regional,branch,hub 1,area,hub 2 assigned to them.

                   $people = [];

                   array_push($people , $regional , $area, $hub_2);

                   foreach ($hub_1 as $hub1){

                       array_push($people , $hub1 );

                   }

                   foreach ($branch as $bra1){

                       array_push($people , $bra1 );

                   }

                   //customer is fetched after looping through people array twice

                   $customerss = [];

                   foreach ( $people as $person ){

                       foreach ($person as $persons){

                           $customer = Customers::where('branch', $persons->id)
                               ->join('users', 'users.id', '=', 'customers.user_id')
                               ->join('branch', 'branch.id', '=', 'customers.branch')
                               ->select('customers.*', 'users.username','branch.name')
                               ->where('status', 1)
                               ->get();

                           array_push($customerss,$customer);

                       }

                   }

                   // the result is then flattened to get desired result

                   $customers = array_flatten($customerss);

               }elseif ($access->hierachy == 'area office'){

                   $are = Branch::where('id',$branch)
                       ->first();

                   $area = Branch::where('id',$branch)
                       ->get();



                   $branches = Branch::where('under',$are->id)
                       ->where('hierachy','branch office')
                       ->get() ;



                   $hub_1 = Branch::where('under',$are->id)
                       ->where('hierachy','hub 1 office')
                       ->get() ;



                   $branch = [];

                   foreach ($hub_1 as $hub){

                       $bra= Branch::where('under',$hub->id)
                           ->where('hierachy','branch office')
                           ->get();

                       array_push($branch, $bra);

                   }



                   $people = [];

                   array_push($people , $area, $branches );

                   foreach ($branch as $bra1){

                       array_push($people , $bra1 );

                   }

                   $customerss =[];

                   foreach($people as $person){

                       foreach ($person as $persons){

                           $customer = Customers::where('branch', $persons->id )
                               ->join('users', 'users.id', '=', 'customers.user_id')
                               ->join('branch', 'branch.id', '=', 'customers.branch')
                               ->select('customers.*', 'users.username','branch.name')
                               ->where('status', 1)
                               ->get();

                           array_push($customerss,$customer);

                       }

                   }

                   $customers = array_flatten($customerss);

               }elseif ($access->hierachy == 'hub 1 office'){

                   $hub = Branch::where('id',$branch)
                       ->first();

                   $hub_1 = Branch::where('id',$branch)
                       ->get();

                   $branches = Branch::where('under',$hub->id)
                       ->where('hierachy','branch office')
                       ->get() ;

                   $people=[];

                   array_push($people,$hub_1,$branches);

                   $customerss =[];

                   foreach($people as $person){

                       foreach ($person as $persons){

                           $customer = Customers::where('branch', $persons->id )
                               ->join('users', 'users.id', '=', 'customers.user_id')
                               ->join('branch', 'branch.id', '=', 'customers.branch')
                               ->select('customers.*', 'users.username','branch.name')
                               ->where('status', 1)
                               ->get();

                           array_push($customerss,$customer);

                       }

                   }



                   $customers = array_flatten($customerss);



               }elseif ($access->hierachy == 'hub 2 office'){

                   $hub = Branch::where('id',$branch)
                       ->first();

                   $hub_2 = Branch::where('id',$branch)
                       ->get();

                   $branches = Branch::where('under',$hub->id)
                       ->where('hierachy','branch office')
                       ->get() ;

                   $people=[];

                   array_push($people,$hub_2,$branches);

                   $customerss =[];

                   foreach($people as $person){

                       foreach ($person as $persons){

                           $customer = Customers::where('branch', $persons->id )
                               ->join('users', 'users.id', '=', 'customers.user_id')
                               ->join('branch', 'branch.id', '=', 'customers.branch')
                               ->select('customers.*', 'users.username','branch.name')
                               ->where('status', 1)
                               ->get();

                           array_push($customerss,$customer);

                       }

                   }

                   $customers = array_flatten($customerss);


               }elseif ($access->hierachy == 'branch office'){

                   $branch = Branch::where('id',$branch)
                       ->first();

                   $customers = Customers::where('branch', $branch->id )
                       ->join('users', 'users.id', '=', 'customers.user_id')
                       ->join('branch', 'branch.id', '=', 'customers.branch')
                       ->select('customers.*', 'users.username','branch.name')
                       ->where('status', 1)
                       ->get();

               }elseif ($access->hierachy == 'virtual branch'){

                   $vir = Branch::where('id',$branch)
                       ->first();

                   $customers = Customers::where('branch', $vir->id )
                       ->join('users', 'users.id', '=', 'customers.user_id')
                       ->join('branch', 'branch.id', '=', 'customers.branch')
                       ->select('customers.*', 'users.username','branch.name')
                       ->where('status', 1)
                       ->get();

               }else{

                   $customers = [];

               }



               foreach ($customers as $id){

                   $inbox_users = new Inbox_users;

                   $inbox_users->note_id = $inbox->id ;

                   $inbox_users->user_id = $id->user_id;

                   $inbox_users->flag = 1;

                   $inbox_users->status = 1;

                   $inbox_users->save();

               }


           }

        }else{

            Session::flash('error', 'Sorry! Unit cant be deleted try again');
            return redirect('/admin/inbox');

        }

    }



}
