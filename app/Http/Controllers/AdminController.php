<?php

namespace App\Http\Controllers;
use App\Customers;
use App\Transactions;
use Illuminate\Support\Facades\Route;

use Session;
use Redirect;
use App\Admin;
use App\User;
use App\Branch;
use App\Units;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Hash;



class AdminController extends Controller
{
    //	public function index(){
//
//        //$user = Auth::user();
//
//        $admins = DB::table('admins')->join('users','users.id','=','admins.user_id')->select('admins.*', 'users.*')->get()->toArray();
//
//
//        return view('admin/index1')->with([/*'user'=> $user,*/ 'admins'=> $admins]);
//
//
//	}

    /*public function create(Request $request)
    {
        $user = new User;
        $user->username = $request->input('username');
        $user->password = bcrypt($request->input('password'));
        $user->status = 2; // Not yet verified
        $user->user_type = 1; // 1 for admin profile
        
        if($user->save()){
            
            $admin = new Admin;
            
            $admin->user_id = $user->id;    

            $admin->name = $request->input('name');

            $admin->phone = $request->input('phone');

            $admin->email = $request->input('email');

            $admin->staff_id = $request->input('staff_id');

            $admin->staff_unit = $request->input('staff_unit');

            $admin->staff_unit_id = $request->input('staff_unit_id');

            $admin->branch = $request->input('branch');

            $admin->email = $request->input('email');
                
            
            $avatar = $request->file('profile_picture'); 

            $filename = time();

            $extension = $avatar->extension();

            $path = 'images/'.$filename.'.'.$extension;

            move_uploaded_file($avatar, public_path($path));
        
            if ($request->file('profile_picture')->isValid()) {
                
                $admin->avatar = $path;

            }

            if($admin->save()){
                Session::flash('success', 'Congrats! New record saved');
                return back();
            }
            else{
                Session::flash('error', 'Ooops! An error occured');
                return back();
            }
        }   
        else{
            Session::flash('error', 'Ooops! An error occured');
            return back();
        } 

    }*/
    
    /*public function destroy($id)
    {
        //
        try
        {

            $admin = Admin::findOrFail($id);


            if ($admin->delete())
            {


            $user = User::findByDetailsId($id);

            $user->delete();

            return response()->json(['error' => false, 'message' => 'Admin record deleted successfully'],200);
            
            }

            return response()->json(['error' => true, 'message' => 'Admin record could not be deleted'],200);
        
        }
        catch (ModelNotFoundException $ex)
        {
            return response()->json(['error' => true, 'message' => 'Record not found'],404);
        }

    }*/

    public function g_login(){
        return view('admin/login');
    }

    public function g_madmin($id=null){
        $admin = new Admin;
        $user = Auth::user();
        if(!$user){
            return redirect('admin/login');
        }

        if($user->user_type == 2){
            return redirect('/betabet');
        }

        $admins = DB::table('admins')
            ->join('branch', 'branch.id', '=', 'admins.branch')
            ->select('admins.*',  'branch.name as branch_name')
            ->get();

        $name = Admin::where("user_id",$user->id)->first();

        $privillage = Units::where('id',$name->	staff_unit_id)->first();

        return view('admin/madmin', compact("name","admins","id",'privillage'));
    }

    public function g_addadminrole(){
        $admin = new Admin;
        $user = Auth::user();
        if(!$user){
            return redirect('admin/login');
        }

        if($user->user_type == 2){
            return redirect('/betabet');
        }

        $name = Admin::where("user_id",$user->id)->first();

        $privillage = Units::where('id',$name->	staff_unit_id)->first();

        return view('admin/addadminrole', compact("name",'privillage'));
    }


    public function g_assign_branch_and_unit($id){
        $admin = new Admin;
        $user = Auth::user();
        if(!$user){
            return redirect('admin/login');
        }

        if($user->user_type == 2){
            return redirect('/betabet');
        }



        $name = Admin::where("user_id",$user->id)->first();
        $admins = Admin::where("id",$id)->first();

        $branchs = Branch::all();
        $unit = Units::all();

        $privillage = Units::where('id',$name->	staff_unit_id)->first();

        return view('admin/assign_branch_and_unit', compact("name", 'unit','id','admins','branchs','privillage'));
    }


    public function  p_add_Unit(){

        $staff_unit = request()->staff_unit;
        $funding = request()->funding;
        $withdrawal = request()->withdrawal;
        $chat_update = request()->chat_update;
        $blogs = request()->blogs;
        $contact_us = request()->contact_us;
        $contact_us_page = request()->contact_us_page;
        $how_to = request()->how_to;
        $faq = request()->faq;
        $social_icons = request()->social_icons;
        $manage_admin = request()->manage_admin;
        $approve_reg = request()->approve_reg;
        $customers = request()->customers;
        $company_structure = request()->company_structure;


        if( Units::where("staff_unit", $staff_unit)->first()){
            return response()
            ->json(['message' => 'error']);
        }



        $unit = new Units;
        $unit->staff_unit = $staff_unit;
        $unit->funding = $funding;
        $unit->withdrawal = $withdrawal;
        $unit->chat_update = $chat_update;
        $unit->blogs = $blogs;
        $unit->contact_us = $contact_us;
        $unit->contact_us_page = $contact_us_page;
        $unit->how_to = $how_to;
        $unit->faq = $faq;
        $unit->social_icons = $social_icons;
        $unit->manage_admin = $manage_admin;
        $unit->approve_reg = $approve_reg;
        $unit->customers = $customers;
        $unit->company_structure = $company_structure;
        $unit->create_unit = 1;
        $unit->flag = 1;


        if ($unit->save()) {

            Session::flash('delete', 'Congrats! Unit record saved');
            return response()
            ->json(['success' => 'cool']);

        }else{
            Session::flash('error', 'Sorry! Unit cant be deleted try again');
            return redirect('/admin/units');

        }

    }

    public function  g_updateUnit(){

        $staff_unit = request()->staff_unit;
        $funding = request()->funding;
        $withdrawal = request()->withdrawal;
        $chat_update = request()->chat_update;
        $blogs = request()->blogs;
        $contact_us = request()->contact_us;
        $contact_us_page = request()->contact_us_page;
        $how_to = request()->how_to;
        $faq = request()->faq;
        $social_icons = request()->social_icons;
        $manage_admin = request()->manage_admin;
        $approve_reg = request()->approve_reg;
        $customers = request()->customers;
        $company_structure = request()->company_structure;
        $id = request()->id;

        $tickets = request()->tickets;
        $inbox = request()->inbox;
        $activate_know_your_customer = request()->activate_know_your_customer;
        $basic_settings = request()->basic_settings;
        $approved_account_number = request()->approved_account_number;
        $set_tickets = request()->set_tickets;




        $unit = Units::find($id);
        $unit->staff_unit = $staff_unit;
        $unit->funding = $funding;
        $unit->withdrawal = $withdrawal;
        $unit->chat_update = $chat_update;
        $unit->blogs = $blogs;
        $unit->contact_us = $contact_us;
        $unit->contact_us_page = $contact_us_page;
        $unit->how_to = $how_to;
        $unit->faq = $faq;
        $unit->social_icons = $social_icons;
        $unit->manage_admin = $manage_admin;
        $unit->approve_reg = $approve_reg;
        $unit->customers = $customers;
        $unit->company_structure = $company_structure;

        $unit->tickets = $tickets;
        $unit->inbox = $inbox;
        $unit->activate_know_your_customer = $activate_know_your_customer;
        $unit->basic_settings = $basic_settings;
        $unit->approved_account_number = $approved_account_number;
        $unit->set_tickets = $set_tickets;
        $unit->create_unit = 1;



        if ($unit->save()) {

            Session::flash('update', 'Congrats! Unit record updated');
            return redirect('/admin/units');

        }else{
            Session::flash('error', 'Sorry! Unit cant be deleted try again');
            return redirect('/admin/units');

        }



    }


    public function  g_deleteUnit(){
        $id = request()->id;
//        $unit = Units::find($id)->delete();
//        echo "success";


        $unit = Units::findOrFail($id);
        $unit->flag = 0;

        if ($unit->save()) {

            Session::flash('delete', 'Congrats! Unit record saved');
            return redirect('/admin/units');

        }else{
            Session::flash('error', 'Sorry! Unit cant be deleted try again');
            return redirect('/admin/units');

        }



    }

    public function  p_updatestaff(){

        $fname = request()->fname;
        $phone = request()->phone;
        $email = request()->email;
        $id = request()->id;



        $admins = Admin::find($id);
        $admins->phone = $phone;
        $admins->email = $email;
        $admins->name = $fname;



        if ($admins->save()) {

            Session::flash('update', 'Congrats! Unit record updated');
            return redirect('/admin/units');

        }else{
            Session::flash('error', 'Sorry! Unit cant be deleted try again');
            return redirect('/admin/units');

        }



    }

    public function  p_assign_staff(){

        $staff_unit = request()->staff_unit;

        $staff_unit_id = Units::where('staff_unit',$staff_unit)->first();

        $branch = request()->branch;

        $id = request()->id;

        $admins = Admin::find($id);

        $admins->branch = $branch;

        $admins->staff_unit_id = $staff_unit_id->id;

        $admins->staff_unit = $staff_unit;

        if ($admins->save()) {

            Session::flash('update', 'Congrats! Unit record updated');
            return redirect('/admin/units');

        }else{
            Session::flash('error', 'Sorry! Unit cant be deleted try again');
            return redirect('/admin/units');

        }

    }

    public function  p_deletestaff(){
        
        $id = request()->id;

        $admins = Admin::findOrFail($id);

        $serial= $admins->user_id;


        if ($admins->delete()) {

            $users = User::findOrFail($serial);
            $users->delete();

            Session::flash('error', 'Deleted Successfully');
            return redirect('/admin/units');

        }else{

            Session::flash('error', 'Sorry! Unit cant be deleted try again');
            return redirect('/admin/units');

        }
    }



  

    public function g_adminrole($id){
        $admin = new Admin;
        $user = Auth::user();
        if(!$user){
            return redirect('admin/login');
        }

        if($user->user_type == 2){
            return redirect('/betabet');
        }

        $name = Admin::where("user_id",$user->id)->first();

        $unit = Units::where("id",$id)->first() ;

        $privillage = Units::where('id',$name->	staff_unit_id)->first();

        return view('admin/adminrole', compact("name","unit","id",'privillage'));
    }

    public function g_units($id=null){
        $admin = new Admin;
        $user = Auth::user();
        if(!$user){
            return redirect('admin/login');
        }

        if($user->user_type == 2){
            return redirect('/betabet');
        }

        $name = Admin::where("user_id",$user->id)->first();

        $unit = Units::where( 'flag','!=', '0')->get() ;

        $privillage = Units::where('id',$name->	staff_unit_id)->first();

        return view('admin/units', compact("name","unit","id",'privillage'));
    }

    public function g_editmadmin($id=null){
        $admin = new Admin;
        $user = Auth::user();
        if(!$user){
            return redirect('admin/login');
        }



        $name = Admin::where("user_id",$user->id)->first();

        $admins = Admin::where("id",$id)->first() ;

        $privillage = Units::where('id',$name->	staff_unit_id)->first();

        return view('admin/editmadmin', compact("name","id","admins",'privillage'));
    }



    public function g_index(){
       // $admin = new Admin;
        $user = Auth::user();
        if(!$user){
            return redirect('admin/login');
        }

        if($user->user_type == 2){
            return redirect('/betabet');
        }

        $name = Admin::where("user_id",$user->id)->first();

        $admin = Admin::where('flag','!=','0')
            ->count();

        $customers = Customers::where('flag','!=','0')
            ->count();

        $funding = Transactions::where('report','1')
            ->where('status','1')
            ->count();

        $withdraw = Transactions::where('report','2')
            ->where('status','1')
            ->count();

        $privillage = Units::where('id',$name->staff_unit_id)->first();

        return view('admin/index', compact("name",'privillage','admin','customers','funding','withdraw'));
    }

    public function p_login(Request $request){

    	$username = $request->input('username');

    	$password = $request->input('password');

    	if (Auth::attempt(['username' => $username, 'password' => $password, 'status'=> 2])){
    		//Authentication passed...

    		$user = Auth::user();

            /*if($user->status != '1'){
                Session::flash('error', 'One last step! Pls go to ur email and click the link we sent you');
        
                return back();
            } */  
            //return redirect()->route('admin/index', $user);
            //return Redirect::route('admin/index')->with( ['user' => $user] );
    		return redirect('admin/index');
            //return view("admin/index" , compact("user", '$user'));
    	}else{		

			//Authentication Failed 
			Session::flash('error', 'Invalid login details supplied');
		
			return back();
		
		}

    }


	public function g_register(){
        return view('admin/register');
    }
    
	public function p_register(Request $request){
        
        if( $request->input('password') != $request->input('password_confirmation') ){
            Session::flash('error', 'Passwords Dont Match');
            return back();
        } 

        if( User::where("username",$request->input("username"))->first()){
            Session::flash('error' , 'Username Already Exist');
            return back();
        } 

        if( Admin::where( "staff_id",$request->input("staff_id"))->first() ){
            Session::flash('error', 'Staff Id Already Exist');
            return back();
        } 

        if(empty($request->input("staff_id")) ){
            Session::flash('error', 'Staff Id is Empty');
            return back();
        } 

        if(empty($request->input("username"))   ){
            Session::flash('error', 'Username is Empty');
            return back();
        } 

        if(empty($request->input("password"))   ){
            Session::flash('error', 'Password is Empty');
            return back();
        } 

        if(empty($request->input("phone"))   ){
            Session::flash('error', 'Phone is Empty');
            return back();
        } 

        if(empty($request->input("email"))  ){
            Session::flash('error', 'Email is Empty');
            return back();
        } 

        if(empty($request->input("name"))   ){
            Session::flash('error', 'Name is Empty');
            return back();
        } 

        

       
      

        $user = new User;
        $user->username = $request->input('username');
        $user->password = bcrypt($request->input('password'));
        $user->status = 2; // Not yet verified
        $user->user_type = 1; // 1 for admin profile
        $user->flag = 1; // Not Deleted #active
        
        if($user->save()){
            
            $admin = new Admin;
            
            $admin->user_id = $user->id;    

            $admin->name = $request->input('name');

            $admin->phone = $request->input('phone');

            $admin->email = $request->input('email');

            $admin->staff_id = $request->input('staff_id');

            $admin->branch = 1;

            if($admin->save()){
                Session::flash('success', 'Congrats! New record saved');
                return redirect('admin/madmin/register');
            }
            else{
                Session::flash('error', 'Ooops! An error occured');
                return back();
            }
        }   
        else{
            Session::flash('error', 'Ooops! An error occured');
            return back();
        } 

    }
	
	public function delete($id)
    {
        //
        try
        {

            $admin = Admin::findOrFail($id);


            if ($admin->delete())
            {


            $user = User::findByDetailsId($id);

            $user->delete();

            return response()->json(['error' => false, 'message' => 'Admin record deleted successfully'],200);
            
            }

            return response()->json(['error' => true, 'message' => 'Admin record could not be deleted'],200);
        
        }
        catch (ModelNotFoundException $ex)
        {
            return response()->json(['error' => true, 'message' => 'Record not found'],404);
        }

    }

	
    public function show($id)
    {
        //
      try
        {
            $admin = Admin::findOrFail($id);

            return response()->json(['error' => false, 'admin' => $admin],200);

        }

        catch (ModelNotFoundException $ex)
        {
            return response()->json(['error' => true, 'message' => 'Record not found'],404);
        }



    }
    
    public function update(Request $request, $id)
    {
        $user = User::findByDetailsId($id);
        
        $admin = Admin::findOrFail($id);

            if ($request->has('username'))
            {
                $user->username = $request->input('username');

                if ($request->has('password'))
                    $user->password = bcrypt($request->input('password'));
                    
                 if ($request->has('name'))
                    $admin->name = $request->input('name');
                    
                 if ($request->has('phone'))
                    $admin->phone = $request->input('phone');
                
                 if ($request->has('email'))
                    $admin->email = $request->input('email');
            
            }        
            
            if ($admin->save())
            {
             
               if ($user->save())
               {
                    return response()->json(['error' => false, 'message' => 'User updated successfully with ID: ' . $id],200);
               }
    			else{
    			return response()->json(['error' => true, 'message' => 'Error updating user record'],200);
    
    			}
            }	
    }

	
	
	public function generateAdminID($id)
    {
     
        $customIdentifier = new CustomIdentifier;

        $generatedID = $customIdentifier->generateCustomID($id, "Admin");

        return $generatedID;

    }

    public function generatefakeID()
    {
     
        $fake = time();

        return $fake;
    }

    public function p_logout(){
        Auth::logout();
        return view('admin/login');
    }

    public function g_change_password(){

        $admin = new Admin;

        $user = Auth::user();

        if(!$user){
            return redirect('admin/login');
        }

        if($user->user_type == 2){
            return redirect('/betabet');
        }

        $name = Admin::where("user_id",$user->id)->first();

        $privillage = Units::where('id',$name->	staff_unit_id)->first();

        return view('admin/change_password', compact("name",'privillage'));


    }

    public function p_change_password(Request $request){

        if(empty($request->input("old_pass"))  ){
            Session::flash('error', 'Old Password is Empty');
            return back();
        }

        $database_pass = Auth::user()->password;

        $old_pass = $request->input("old_pass");

        if( Hash::check($old_pass ,$database_pass ) ){



        }else{
            Session::flash('error', 'Old password is incorrect');

            return back();
        }

        if(empty($request->input("new_pass"))  ){
            Session::flash('error', 'New Password is Empty');
            return back();
        }

        if(empty($request->input("re_pass"))  ){
            Session::flash('error', 'Re-Enter Password is Empty');
            return back();
        }

        if( !preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/', $request->input('new_pass')) ){
            Session::flash('error', 'Passwords Must be 6 character long, with atleast one capital letter, one number, and one symbol');
            return back();
        }

        if( $request->input('new_pass') != $request->input('re_pass') ){
            Session::flash('error', 'Passwords Don\'t Match');
            return back();
        }

        $user = Auth::user();

        $user->password = bcrypt($request->input('new_pass'));

        if($user->save()){

            Session::flash('success', 'Congrats! Password Have been changed');
            return back();
        }
        else{
            Session::flash('error', 'Ooops! An error occured pls try agian later');
            return back();
        }


    }
}
