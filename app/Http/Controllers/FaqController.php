<?php

namespace App\Http\Controllers;

use App\Admin;
use Session;
use App\Customers;
use App\Faq;
use App\Units;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FaqController extends Controller
{
    //

    public function g_faq($id=null){

        $user = Auth::user();
        if(!$user){
            return redirect('betabet/login');
        }

        $name = Customers::where("user_id",$user->id)->first();

        $faqs = Faq::all();

        //$transactions = Transactions::where('user_id',$user->id)->get();

        //$pendings = Transactions::where('user_id',$user->id)->where('status',1)->get();

        return view('betabet/faq', compact("name","id",'faqs'));
    }

     public function g_a_faq( $id = null ){

        $user = Auth::user();

        if(!$user){
            return redirect('admin/login');
        }

        $name = Admin::where("user_id",$user->id)
            ->first();

        $privillage = Units::where('id', $name->staff_unit_id )
            ->first();

        $faqs = Faq::where('flag' , '!=', 0)
            ->get();

        return view('admin/FAQ', compact("name",'privillage','id','faqs'));
    }

    public function g_addfaq( $id = null ){

        $user = Auth::user();

        if(!$user){
            return redirect('admin/login');
        }

        $name = Admin::where("user_id",$user->id)
            ->first();

        $privillage = Units::where('id', $name->staff_unit_id )
            ->first();

        return view('admin/addFAQ', compact("name",'privillage','id'));
    }

    public function p_addfaq( ){

        $question = request()->question;

        $answer = request()->answer;

        $faq = new Faq;

        $faq->question = $question;

        $faq->reply = $answer;

        $faq->flag = 1;


        if ($faq->save()) {

            Session::flash('success', 'Congrats!FAQ added successfully');
            return redirect('/admin/FAQ/add');

        }else{
            Session::flash('error', 'Sorry! FAQ cant be deleted try again');
            return redirect('/admin/FAQ/errora');

        }

    }

    public function g_editfaq( $id = null ){

        $user = Auth::user();

        if(!$user){
            return redirect('admin/login');
        }

        $name = Admin::where("user_id",$user->id)
            ->first();

        $privillage = Units::where('id', $name->staff_unit_id )
            ->first();

        $faq = Faq::where('id',$id)->first();

        return view('admin/editFAQ', compact("name",'privillage','id','faq'));
    }

    public function p_deletefaq( ){

        $id = request()->id;

        $faq =  Faq::findOrFail($id);

        $faq->flag = 0;


        if ($faq->save()) {

            Session::flash('success', 'Congrats!FAQ added successfully');
            return redirect('/admin/FAQ/delete');

        }else{
            Session::flash('error', 'Sorry! FAQ cant be deleted try again');
            return redirect('/admin/FAQ/errord');

        }

    }

    public function p_editfaq( ){

        $id = request()->id;

        $question = request()->question;

        $answer = request()->answer;

        $faq =  Faq::findOrFail($id);

        $faq->flag = 1;

        $faq->question = $question;

        $faq->reply = $answer;


        if ($faq->save()) {

            Session::flash('success', 'Congrats!FAQ added successfully');
            return redirect('/admin/FAQ/update');

        }else{
            Session::flash('error', 'Sorry! FAQ cant be deleted try again');
            return redirect('/admin/FAQ/errore');

        }

    }
}
