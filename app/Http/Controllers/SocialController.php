<?php

namespace App\Http\Controllers;

use App\Customers;
use App\Social;
use App\Units;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Session;
use Redirect;
use App\Admin;
use App\User;
use App\Branch;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

use Illuminate\Routing\Redirector;

class SocialController extends Controller
{
    //

    public function g_how_to($id = null){

        $user = Auth::user();

        if(!$user){
            return redirect('admin/login');
        }

        $name = Admin::where("user_id",$user->id)
            ->first();

        $privillage = Units::where('id', $name->staff_unit_id )
            ->first();

        $how = Social::first();

        return view('admin/howto', compact("name",'privillage','how','id'));
    }


    public function g_edit_how_to( $id = null ){

        $user = Auth::user();

        if(!$user){
            return redirect('admin/login');
        }

        $name = Admin::where("user_id",$user->id)
            ->first();

        $privillage = Units::where('id', $name->staff_unit_id )
            ->first();

        $how = Social::first();

        return view('admin/edithowto', compact("name",'privillage','how','id'));
    }

    public function p_edit_how_to(){

       // $id = request()->id;

        $how = request()->how;

        $social = Social::findOrFail(1);

        $social->how_to = $how;


        if ($social->save()) {

            Session::flash('success', 'Congrats! How to have been updated successfully');
            return redirect('/admin/howto/update');

        }else{
            Session::flash('error', 'Sorry! how to cant be deleted try again');
            return redirect('/admin/howto/error');

        }

    }

    public function g_social( $id = null ){

        $user = Auth::user();

        if(!$user){
            return redirect('admin/login');
        }

        $name = Admin::where("user_id",$user->id)
            ->first();

        $privillage = Units::where('id', $name->staff_unit_id )
            ->first();

        $social = Social::first();

        return view('admin/social', compact("name",'privillage','social','id'));
    }

    public function g_editsocial( $id = null ){

        $user = Auth::user();

        if(!$user){
            return redirect('admin/login');
        }

        $name = Admin::where("user_id",$user->id)
            ->first();

        $privillage = Units::where('id', $name->staff_unit_id )
            ->first();

        $social = Social::first();

        return view('admin/editsocial', compact("name",'privillage','social','id'));
    }

    public function p_editsocial(){

        $youtube = request()->youtube;

        $facebook = request()->facebook;

        $twitter = request()->twitter;

        $pintrest = request()->pintrest;

        $flicker = request()->flicker;

        $instagram = request()->instagram;

        $google = request()->google;

        $social = Social::findOrFail(1);

        $social->facebook = $facebook;

        $social->youtube = $youtube;

        $social->twitter = $twitter;

        $social->pintrest = $pintrest;

        $social->flicker = $flicker;

        $social->instagram = $instagram;

        $social->google = $google;

        if ($social->save()) {

            Session::flash('success', 'Congrats! How to have been updated successfully');
            return redirect('/admin/social/update');

        }else{
            Session::flash('error', 'Sorry! how to cant be deleted try again');
            return redirect('/admin/social/error');

        }

    }
}
