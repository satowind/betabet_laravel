<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Customers;
use App\Ticket;
use App\Ticket_category;
use App\Tickets;
use App\Units;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function g_ticket( $id = null){

        $user = Auth::user();
        if(!$user){
            return redirect('betabet/login');
        }

        $name = Customers::where("user_id",$user->id)
            ->first();

        $ticket_categorys = Ticket_category::get();

        $ticket_title = Ticket::where('user_id',$user->id)
            ->join('ticket_categories','ticket_categories.id','ticket.issue_title')
            ->select('ticket_categories.title','ticket.*')
            ->get();

        return view('/betabet/ticket',compact('name','ticket_categorys','id','ticket_title'));
    }

    public function p_create_ticket(){

        $ticket_category = request()->ticket_category;
        $explain = request()->explain;
        $user = Auth::user();

        $ticket = new Ticket ;
        $ticket->issue_title = $ticket_category ;
        $ticket->user_id =  $user->id ;
        $ticket->flag =  1 ;
        $ticket->status =  1 ;

        if($ticket->save()){

            $tickets = new Tickets ;

            $tickets->chats =  $explain;
            $tickets->customers_id =  $user->id ;
            $tickets->ticket_id =  $ticket->id ;

            $tickets->save()  ;

        }

    }

    public function p_fetch_ticket(){

        $id = request()->id;



        $ticket_chat = Tickets::where('ticket_id', $id )
            ->get();

        return response()->json(['ticket_chat'=> $ticket_chat]);


    }

    public function g_ticket_single($id = null){

        $user = Auth::user();
        if(!$user){
            return redirect('betabet/login');
        }

        $name = Customers::where("user_id",$user->id)
            ->first();

        $ticket_titles = Tickets::where('ticket_id',$id)
            ->get();

        $ticket = Ticket::where('ticket.id',$id)
            ->join('ticket_categories','ticket.issue_title','ticket_categories.id')
            ->first();

        return view('/betabet/ticket_single',compact('name','id','ticket_titles','ticket'));
    }

    public function p_add_issue(){

        $id = request()->id;
        $explain = request()->explain;

        $user = Auth::user();


        $tickets = new Tickets ;

        $tickets->chats =  $explain;
        $tickets->customers_id =  $user->id ;
        $tickets->ticket_id =  $id ;

        $tickets->save();


    }

    public function p_close_ticket(){

        $id = request()->id;

        $ticket =  Ticket::findOrFail($id) ;

        $ticket->status = 0;
        $ticket->save();

    }

    public function g_admin_ticket_category($id = null){
        $admin = new Admin;
        $user = Auth::user();
        if(!$user){
            return redirect('admin/login');
        }

        $name = Admin::where("user_id",$user->id)->first();



        $privillage = Units::where('id',$name->	staff_unit_id)->first();

        $ticket_title = Ticket::join('ticket_categories','ticket_categories.id','ticket.issue_title')
            ->join('customers','customers.user_id','ticket.user_id')
            ->select('ticket_categories.title','ticket.*','customers.surname','customers.firstname')
            ->get();

        return view('admin/tickets', compact("name",'privillage','id','ticket_title'));
    }

    public function g_admin_ticket_single_category($id = null){
        $admin = new Admin;
        $user = Auth::user();
        if(!$user){
            return redirect('admin/login');
        }

        $name = Admin::where("user_id",$user->id)->first();

        $privillage = Units::where('id',$name->	staff_unit_id)->first();

        $ticket_titles = Tickets::where('ticket_id',$id)
            ->get();

        $ticket = Ticket::where('ticket.id',$id)
            ->join('ticket_categories','ticket.issue_title','ticket_categories.id')
            ->first();

        return view('admin/tickets_single', compact("name",'privillage','id','ticket_titles','ticket'));
    }

    public function p_admin_add_issue(){

        $id = request()->id;
        $explain = request()->explain;

        $user = Auth::user();

        $tickets = new Tickets ;

        $tickets->chats =  $explain;
        $tickets->admin_id =  $user->id ;
        $tickets->ticket_id =  $id ;

        $tickets->save();

    }

    public function p_admin_close_ticket(){

        $id = request()->id;

        $ticket =  Ticket::findOrFail($id) ;

        $ticket->status = 0;
        $ticket->save();

    }
}
