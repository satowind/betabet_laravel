<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Ticket;
use App\Ticket_category;
use App\Units;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketCategoryController extends Controller
{
    //

    public function g_ticket_category($id =null)
    {
        $admin = new Admin;
        $user = Auth::user();
        if(!$user){
            return redirect('admin/login');
        }

        $name = Admin::where("user_id",$user->id)->first();

        $ticket = Ticket_category::get() ;


        $privillage = Units::where('id',$name->staff_unit_id)
            ->first();

        return view('admin/ticket_category', compact("name","id", 'ticket','privillage'));
    }

    public function p_add_ticket_category()
    {


        $name = request()->cat;
        $cat = new Ticket_category ;
        $cat->title = $name ;
        //$cat->status = 1;
        $cat->save();

    }

    public function p_delete_ticket_category()
    {

        $id = request()->id;

        $cat = Ticket_category::findOrFail($id) ;
        $cat->delete();

    }
}
