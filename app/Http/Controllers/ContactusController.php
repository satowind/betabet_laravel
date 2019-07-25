<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Contact;
use App\Faq;
use App\Units;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactusController extends Controller
{
    //

    public function g_a_contact( $id = null ){

        $user = Auth::user();

        if(!$user){
            return redirect('admin/login');
        }

        $name = Admin::where("user_id",$user->id)
            ->first();

        $privillage = Units::where('id', $name->staff_unit_id )
            ->first();

        $contact = Contact::first();

        return view('admin/contact', compact("name",'privillage','id','contact'));
    }
}
