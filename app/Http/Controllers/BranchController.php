<?php

namespace App\Http\Controllers;

use App\Units;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;

use Session;
use Redirect;
use App\Admin;
use App\User;
use App\Branch;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Redirector;

class BranchController extends Controller
{

//head office code

    public function g_head_office($id=null){
        $admin = new Admin;
        $user = Auth::user();
        if(!$user){
            return redirect('admin/login');
        }

        $name = Admin::where("user_id",$user->id)->first();


        $branch = Branch::where("hierachy",'head office')->where( 'flag','!=', '0')->get() ;

        $privillage = Units::where('id',$name->staff_unit_id)->first();

        return view('admin/headoffice', compact("name","id", 'branch','privillage'));
    }

    public function g_editheadoffice($id=null){
        $admin = new Admin;
        $user = Auth::user();
        if(!$user){
            return redirect('admin/login');
        }

        $name = Admin::where("user_id",$user->id)->first();


        $branch = Branch::where("id",$id)->where( 'flag','!=', '0')->where("hierachy",'head office')->first() ;

        $privillage = Units::where('id',$name->staff_unit_id)->first();

        return view('admin/editheadoffice', compact("name","id", 'branch','privillage'));
    }

    public function  p_delete_head_office(){
        $id = request()->id;

        $branch = branch::findOrFail($id);
        $branch->flag = 0;


        if ($branch->save()) {

            Session::flash('delete', 'Congrats! Unit record saved');
            return redirect('/admin/units');

        }else{
            Session::flash('error', 'Sorry! Unit cant be deleted try again');
            return redirect('/admin/units');

        }



    }

    public function g_add_head_office(){
        $admin = new Admin;
        $user = Auth::user();
        if(!$user){
            return redirect('admin/login');
        }

        $name = Admin::where("user_id",$user->id)->first();

        $privillage = Units::where('id',$name->staff_unit_id)->first();

        return view('admin/add_headoffice', compact("name",'privillage'));
    }

    public function p_add_headoffice(){

        $name = request()->name;
        $email = request()->email;
        $phone = request()->phone;
        $address = request()->address;
        $national = request()->national;
        $state = request()->state;
        $local = request()->local;
        $city = request()->city;

        $branch = new Branch;

        $branch->name = $name;
        $branch->phone = $phone;
        $branch->email = $email;
        $branch->address = $address;
        $branch->country = $national;
        $branch->state = $state;
        $branch->lga = $local;
        $branch->city = $city;
        $branch->hierachy = 'head office';
        $branch->rank = 1;

        if ($branch->save()) {

            Session::flash('delete', 'Congrats! Unit record saved');
            return redirect('/admin/units');

        }else{

            Session::flash('error', 'Sorry! Unit cant be deleted try again');
            return redirect('/admin/units');

        }

    }

    public function  p_update_head_office(){

        $name = request()->name;
        $email = request()->email;
        $phone = request()->phone;
        $address = request()->address;
        $national = request()->national;
        $state = request()->state;
        $local = request()->local;
        $city = request()->city;
        $id = request()->id;

        $branch = branch::find($id);

        $branch->name = $name;
        $branch->phone = $phone;
        $branch->email = $email;
        $branch->address = $address;
        $branch->country = $national;
        $branch->state = $state;
        $branch->lga = $local;
        $branch->city = $city;
        $branch->hierachy = 'head office';
        $branch->rank = 1;

        if ($branch->save()) {

            Session::flash('update', 'Congrats! Unit record updated');
            return redirect('/admin/units');

        }else{
            Session::flash('error', 'Sorry! Unit cant be deleted try again');
            return redirect('/admin/units');

        }

    }




//regional office codes

    public function g_regional_office($id=null){
        $admin = new Admin;
        $user = Auth::user();
        if(!$user){
            return redirect('admin/login');
        }

        $name = Admin::where("user_id",$user->id)->first();

        $branch = Branch::where("hierachy",'regional office')->where( 'flag','!=', '0')->get() ;

        $privillage = Units::where('id',$name->staff_unit_id)->first();

        return view('admin/regional_office', compact("name","id", 'branch','privillage'));
    }


    public function g_add_regional_office(){
        $admin = new Admin;
        $user = Auth::user();
        if(!$user){
            return redirect('admin/login');
        }

        $branch = Branch::where("hierachy",'head office')->where( 'flag','!=', '0')->get() ;

        $name = Admin::where("user_id",$user->id)->first();

        $privillage = Units::where('id',$name->staff_unit_id)->first();

        return view('admin/add_regionaloffice', compact("name",'branch','privillage'));
    }

    public function p_add_regional_office(){

        $name = request()->name;
        $email = request()->email;
        $phone = request()->phone;
        $address = request()->address;
        $national = request()->national;
        $state = request()->state;
        $local = request()->local;
        $city = request()->city;
        $under = request()->under;

        $branch = new Branch;

        $branch->name = $name;
        $branch->phone = $phone;
        $branch->email = $email;
        $branch->address = $address;
        $branch->country = $national;
        $branch->state = $state;
        $branch->lga = $local;
        $branch->city = $city;
        $branch->hierachy = 'regional office';
        $branch->rank = 2;
        $branch->under = $under;

        if ($branch->save()) {

            Session::flash('delete', 'Congrats! Unit record saved');
            return redirect('/admin/units');

        }else{

            Session::flash('error', 'Sorry! Unit cant be deleted try again');
            return redirect('/admin/units');

        }

    }


    public function g_editregionaloffice($id=null){

        $admin = new Admin;

        $user = Auth::user();

        if(!$user){
            return redirect('admin/login');
        }

        $name = Admin::where("user_id",$user->id)->first();

        $branch = Branch::where("id",$id)->where( 'flag','!=', '0')->where("hierachy",'regional office')->first() ;

        $bra = Branch::where("hierachy",'head office')->get() ;

        $privillage = Units::where('id',$name->staff_unit_id)->first();

        return view('admin/editregionaloffice', compact("name","id", 'branch', 'bra','privillage'));
    }


    public function  p_update_regional_office(){

        $name = request()->name;
        $email = request()->email;
        $phone = request()->phone;
        $address = request()->address;
        $national = request()->national;
        $state = request()->state;
        $local = request()->local;
        $city = request()->city;
        $id = request()->id;
        $under = request()->under;

        $branch = branch::find($id);

        $branch->name = $name;
        $branch->phone = $phone;
        $branch->email = $email;
        $branch->address = $address;
        $branch->country = $national;
        $branch->state = $state;
        $branch->lga = $local;
        $branch->city = $city;
        $branch->hierachy = 'regional office';
        $branch->rank = 2;
        $branch->under = $under;


        if ($branch->save()) {

            Session::flash('update', 'Congrats! Unit record updated');
            return redirect('/admin/units');

        }else{
            Session::flash('error', 'Sorry! Unit cant be deleted try again');
            return redirect('/admin/units');

        }

    }






    //Area office

    public function g_area_office($id=null){

        $admin = new Admin;

        $user = Auth::user();

        if(!$user){
            return redirect('admin/login');
        }

        $name = Admin::where("user_id",$user->id)->first();

        $privillage = Units::where('id',$name->staff_unit_id)->first();

        $branch = Branch::where("hierachy",'area office')->where( 'flag','!=', '0')->get() ;


        return view('admin/areaoffice', compact("name","id", 'branch','privillage'));
    }

    public function g_add_area_office(){

        $admin = new Admin;

        $user = Auth::user();

        if(!$user){
            return redirect('admin/login');
        }

        $branch = Branch::where("hierachy",'regional office')->where( 'flag','!=', '0')->get() ;

        $name = Admin::where("user_id",$user->id)->first();

        $privillage = Units::where('id',$name->staff_unit_id)->first();

        return view('admin/add_areaoffice', compact("name",'branch','privillage'));
    }

    public function p_add_areaoffice(){

        $name = request()->name;
        $email = request()->email;
        $phone = request()->phone;
        $address = request()->address;
        $national = request()->national;
        $state = request()->state;
        $local = request()->local;
        $city = request()->city;
        $under = request()->under;

        $branch = new Branch;

        $branch->name = $name;
        $branch->phone = $phone;
        $branch->email = $email;
        $branch->address = $address;
        $branch->country = $national;
        $branch->state = $state;
        $branch->lga = $local;
        $branch->city = $city;
        $branch->hierachy = 'area office';
        $branch->rank = 3;
        $branch->under = $under;

        if ($branch->save()) {

            Session::flash('delete', 'Congrats! Unit record saved');
            return redirect('/admin/units');

        }else{

            Session::flash('error', 'Sorry! Unit cant be deleted try again');
            return redirect('/admin/units');

        }

    }


    public function g_editareaoffice($id=null){

        $admin = new Admin;

        $user = Auth::user();

        if(!$user){
            return redirect('admin/login');
        }

        $name = Admin::where("user_id",$user->id)->first();

        $privillage = Units::where('id',$name->staff_unit_id)->first();

        $branch = Branch::where("id",$id)->where( 'flag','!=', '0')->where("hierachy",'area office')->first() ;

        $bra = Branch::where("hierachy",'regional office')->get() ;

        return view('admin/editareaoffice', compact("name","id", 'branch', 'bra','privillage'));
    }


    public function  p_update_area_office(){

        $name = request()->name;
        $email = request()->email;
        $phone = request()->phone;
        $address = request()->address;
        $national = request()->national;
        $state = request()->state;
        $local = request()->local;
        $city = request()->city;
        $id = request()->id;
        $under = request()->under;

        $branch = branch::find($id);

        $branch->name = $name;
        $branch->phone = $phone;
        $branch->email = $email;
        $branch->address = $address;
        $branch->country = $national;
        $branch->state = $state;
        $branch->lga = $local;
        $branch->city = $city;
        $branch->hierachy = 'area office';
        $branch->rank = 3;
        $branch->under = $under;


        if ($branch->save()) {

            Session::flash('update', 'Congrats! Unit record updated');
            return redirect('/admin/units');

        }else{
            Session::flash('error', 'Sorry! Unit cant be deleted try again');
            return redirect('/admin/units');

        }

    }




    //hub 1 codes

    public function g_hub1_office($id=null){

        $admin = new Admin;

        $user = Auth::user();

        if(!$user){
            return redirect('admin/login');
        }

        $name = Admin::where("user_id",$user->id)->first();

        $privillage = Units::where('id',$name->staff_unit_id)->first();

        $branch = Branch::where("hierachy",'hub 1 office')->where( 'flag','!=', '0')->get() ;


        return view('admin/hub1_office', compact("name","id", 'branch','privillage'));
    }

    public function g_add_hub1_office(){

        $admin = new Admin;

        $user = Auth::user();

        if(!$user){
            return redirect('admin/login');
        }

        $branch = Branch::where("hierachy",'area office')->where( 'flag','!=', '0')->get() ;

        $name = Admin::where("user_id",$user->id)->first();

        $privillage = Units::where('id',$name->staff_unit_id)->first();

        return view('admin/add_hub1office', compact("name",'branch','privillage'));
    }

    public function p_add_hub1_office(){

        $name = request()->name;
        $email = request()->email;
        $phone = request()->phone;
        $address = request()->address;
        $national = request()->national;
        $state = request()->state;
        $local = request()->local;
        $city = request()->city;
        $under = request()->under;

        $branch = new Branch;

        $branch->name = $name;
        $branch->phone = $phone;
        $branch->email = $email;
        $branch->address = $address;
        $branch->country = $national;
        $branch->state = $state;
        $branch->lga = $local;
        $branch->city = $city;
        $branch->hierachy = 'hub 1 office';
        $branch->rank = 5;
        $branch->under = $under;

        if ($branch->save()) {

            Session::flash('delete', 'Congrats! Unit record saved');
            return redirect('/admin/units');

        }else{

            Session::flash('error', 'Sorry! Unit cant be deleted try again');
            return redirect('/admin/units');

        }

    }

    public function g_edithub1office($id=null){
        $admin = new Admin;
        $user = Auth::user();
        if(!$user){
            return redirect('admin/login');
        }

        $name = Admin::where("user_id",$user->id)->first();


        $branch = Branch::where("id",$id)->where( 'flag','!=', '0')->where("hierachy",'hub 1 office')->first() ;

        $bra = Branch::where("hierachy",'area office')->get() ;

        $privillage = Units::where('id',$name->staff_unit_id)->first();

        return view('admin/edithub1office', compact("name","id", 'branch', 'bra','privillage'));
    }


    public function  p_update_hub1_office(){

        $name = request()->name;
        $email = request()->email;
        $phone = request()->phone;
        $address = request()->address;
        $national = request()->national;
        $state = request()->state;
        $local = request()->local;
        $city = request()->city;
        $id = request()->id;
        $under = request()->under;

        $branch = branch::find($id);

        $branch->name = $name;
        $branch->phone = $phone;
        $branch->email = $email;
        $branch->address = $address;
        $branch->country = $national;
        $branch->state = $state;
        $branch->lga = $local;
        $branch->city = $city;
        $branch->hierachy = 'hub 1 office';
        $branch->rank = 5;
        $branch->under = $under;


        if ($branch->save()) {

            Session::flash('update', 'Congrats! Unit record updated');
            return redirect('/admin/units');

        }else{
            Session::flash('error', 'Sorry! Unit cant be deleted try again');
            return redirect('/admin/units');

        }

    }


//hub 2 codes

    public function g_hub2_office($id=null){

        $admin = new Admin;

        $user = Auth::user();

        if(!$user){
            return redirect('admin/login');
        }

        $name = Admin::where("user_id",$user->id)->first();


        $branch = Branch::where("hierachy",'hub 2 office')->where( 'flag','!=', '0')->get() ;

        $privillage = Units::where('id',$name->staff_unit_id)->first();

        return view('admin/hub2_office', compact("name","id", 'branch','privillage'));
    }

    public function g_add_hub2_office(){
        $admin = new Admin;
        $user = Auth::user();
        if(!$user){
            return redirect('admin/login');
        }

        $branch = Branch::where("hierachy",'regional office')->where( 'flag','!=', '0')->get() ;

        $name = Admin::where("user_id",$user->id)->first();

        $privillage = Units::where('id',$name->staff_unit_id)->first();

        return view('admin/add_hub2office', compact("name",'branch','privillage'));
    }

    public function p_add_hub2_office(){

        $name = request()->name;
        $email = request()->email;
        $phone = request()->phone;
        $address = request()->address;
        $national = request()->national;
        $state = request()->state;
        $local = request()->local;
        $city = request()->city;
        $under = request()->under;

        $branch = new Branch;

        $branch->name = $name;
        $branch->phone = $phone;
        $branch->email = $email;
        $branch->address = $address;
        $branch->country = $national;
        $branch->state = $state;
        $branch->lga = $local;
        $branch->city = $city;
        $branch->hierachy = 'hub 2 office';
        $branch->rank = 4;
        $branch->under = $under;

        if ($branch->save()) {

            Session::flash('delete', 'Congrats! Unit record saved');
            return redirect('/admin/units');

        }else{

            Session::flash('error', 'Sorry! Unit cant be deleted try again');
            return redirect('/admin/units');

        }

    }

    public function g_edithub2office($id=null){
        $admin = new Admin;
        $user = Auth::user();
        if(!$user){
            return redirect('admin/login');
        }

        $name = Admin::where("user_id",$user->id)->first();


        $branch = Branch::where("id",$id)->where("hierachy",'hub 2 office')->where( 'flag','!=', '0')->first() ;

        $bra = Branch::where("hierachy",'regional office')->get() ;

        $privillage = Units::where('id',$name->staff_unit_id)->first();

        return view('admin/edithub2office', compact("name","id", 'branch', 'bra','privillage'));
    }


    public function  p_update_hub2_office(){

        $name = request()->name;
        $email = request()->email;
        $phone = request()->phone;
        $address = request()->address;
        $national = request()->national;
        $state = request()->state;
        $local = request()->local;
        $city = request()->city;
        $id = request()->id;
        $under = request()->under;

        $branch = branch::find($id);

        $branch->name = $name;
        $branch->phone = $phone;
        $branch->email = $email;
        $branch->address = $address;
        $branch->country = $national;
        $branch->state = $state;
        $branch->lga = $local;
        $branch->city = $city;
        $branch->hierachy = 'hub 2 office';
        $branch->rank = 4;
        $branch->under = $under;


        if ($branch->save()) {

            Session::flash('update', 'Congrats! Unit record updated');
            return redirect('/admin/units');

        }else{
            Session::flash('error', 'Sorry! Unit cant be deleted try again');
            return redirect('/admin/units');

        }

    }

    //branch office code

    public function g_branch_office($id=null){
        $admin = new Admin;
        $user = Auth::user();
        if(!$user){
            return redirect('admin/login');
        }

        $name = Admin::where("user_id",$user->id)->first();


        $branch = Branch::where("hierachy",'branch office')->where( 'flag','!=', '0')->get() ;

        $privillage = Units::where('id',$name->staff_unit_id)->first();

        return view('admin/branch_office', compact("name","id", 'branch','privillage'));
    }

    public function g_add_branch_office(){
        $admin = new Admin;
        $user = Auth::user();
        if(!$user){
            return redirect('admin/login');
        }

        $branch = Branch::whereIn("hierachy",['hub 1 office', 'hub 2 office' , 'area office'])->where( 'flag','!=', '0')->get() ;

        $name = Admin::where("user_id",$user->id)->first();

        $privillage = Units::where('id',$name->staff_unit_id)->first();

        return view('admin/add_branchoffice', compact("name",'branch','privillage'));
    }

    public function p_add_branchoffice(){

        $name = request()->name;
        $email = request()->email;
        $phone = request()->phone;
        $address = request()->address;
        $national = request()->national;
        $state = request()->state;
        $local = request()->local;
        $city = request()->city;
        $under = request()->under;
        $id = request()->id;
        $code = request()->code;

        $branch = new Branch;

        $branch->bet9ja_id = $id;
        $branch->bet9ja_code = $code;
        $branch->name = $name;
        $branch->phone = $phone;
        $branch->email = $email;
        $branch->address = $address;
        $branch->country = $national;
        $branch->state = $state;
        $branch->lga = $local;
        $branch->city = $city;
        $branch->hierachy = 'branch office';
        $branch->rank = 6;
        $branch->under = $under;

        if ($branch->save()) {

            Session::flash('delete', 'Congrats! Unit record saved');
            return redirect('/admin/units');

        }else{

            Session::flash('error', 'Sorry! Unit cant be deleted try again');
            return redirect('/admin/units');

        }

    }

    public function g_editbranchoffice($id=null){

        $admin = new Admin;

        $user = Auth::user();

        if(!$user){
            return redirect('admin/login');
        }

        $name = Admin::where("user_id",$user->id)->first();


        $branch = Branch::where("id",$id)->where( 'flag','!=', '0')->where("hierachy",'branch office')->first() ;

        $bra = Branch::whereIn("hierachy",['hub 1 office', 'hub 2 office' , 'area office'])->get() ;

        $privillage = Units::where('id',$name->staff_unit_id)->first();

        return view('admin/editbranchoffice', compact("name","id", 'branch', 'bra','privillage'));
    }


    public function  p_update_branch_office(){

        $name = request()->name;
        $email = request()->email;
        $phone = request()->phone;
        $address = request()->address;
        $national = request()->national;
        $state = request()->state;
        $local = request()->local;
        $city = request()->city;
        $id = request()->id;
        $under = request()->under;
        $ids = request()->ids;
        $code = request()->code;

        $branch = branch::find($id);

        $branch->name = $name;
        $branch->phone = $phone;
        $branch->email = $email;
        $branch->address = $address;
        $branch->country = $national;
        $branch->state = $state;
        $branch->lga = $local;
        $branch->city = $city;
        $branch->hierachy = 'branch office';
        $branch->rank = 6;
        $branch->under = $under;
        $branch->bet9ja_id = $ids;
        $branch->bet9ja_code = $code;


        if ($branch->save()) {

            Session::flash('update', 'Congrats! Unit record updated');
            return redirect('/admin/units');

        }else{
            Session::flash('error', 'Sorry! Unit cant be deleted try again');
            return redirect('/admin/units');

        }

    }

    public function branch(){

        $branches = Branch::where('hierachy','branch office')->get();

        return view('branches',compact('branches'));
    }



}
