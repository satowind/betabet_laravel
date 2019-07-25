<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Contact;
use Session;
use Mail;
use App\Social;
use App\Units;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    //


    public function p_contact(){

        $fullname = request()->fullname;

        $phone = request()->phone;

        $email = request()->email;

        $messages = request()->message;

        $data = [
            'fullname'=> $fullname,
            'phone'=> $phone,
            'email'=> $email,
            'messages'=> $messages,
            ];

        $mail = Mail::send('contactmail', $data , function($message) use($data){

            $message->from( $data['email'] , 'contact us');
            $message->SMTPDebug = 4;
            $message->to('info@citycybersolutions.com');
            $message->subject('Contact Us');

            Session::flash('success', 'An Email has been sent to us.Thanks.');

            return view('contact');
        });



//        if ($mail) {
//
//
//            Session::flash('success', 'Thanks you for contacting us our agent will talk to you');
//
//            return redirect('/contact');
//
//        }else{
//
//            Session::flash('error' , 'Bet9ja Code Already Exist');
//
//            return back();
//
//        }

    }

    public function contact(){
        $social= Social::first();
        $contact=Contact::first();
        return view('contact',compact('social','contact'));
    }

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

    public function g_editcontact( $id = null ){

        $user = Auth::user();

        if(!$user){
            return redirect('admin/login');
        }

        $name = Admin::where("user_id",$user->id)
            ->first();

        $privillage = Units::where('id', $name->staff_unit_id )
            ->first();

        $contact = Contact::where('id',$id)
            ->first();

        return view('admin/editcontact', compact("name",'privillage','id','contact'));
    }

    public function p_update_contact(){

        $header = request()->header;

        $sub_header = request()->sub_header;

        $phone = request()->phone;

        $email = request()->email;

        $address = request()->address;

        $ho_email = request()->ho_email;

        $ho_phone = request()->ho_phone;

        $ho_address = request()->ho_address;

        $contact = Contact::findOrFail(1);

        $contact->header = $header;

        $contact->sub_header = $sub_header;

        $contact->phone = $phone;

        $contact->email = $email;

        $contact->address = $address;

        $contact->ho_email = $ho_email;

        $contact->ho_phone = $ho_phone;

        $contact->ho_address = $ho_address;

        if ($contact->save()) {

            Session::flash('success', 'Congrats!Contact updated successfully');
            return redirect('/admin/contact/update');

        }else{

            Session::flash('error', 'Sorry! Contact cant be deleted try again');
            return redirect('/admin/contact/erroru');

        }

    }
}
