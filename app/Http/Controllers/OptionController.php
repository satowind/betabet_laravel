<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Option;
use App\Units;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OptionController extends Controller
{
    //
    public function g_index( $id = Null ){

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

        $options = Option::get();

        $privillage = Units::where('id',$name->staff_unit_id)->first();

        return view('admin/options', compact("name",'privillage','admin','options', 'id'));

    }

    public function p_edit_option(Request $request){

        $id = request()->id;

        $value = request()->value;

        $option = Option::findOrFail($id);
        $option->option_value = $value;


        if ($option->save()) {



        }else{


        }


    }
}
