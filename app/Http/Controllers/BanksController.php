<?php

namespace App\Http\Controllers;

use App\Banks;
use App\Units;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Route;

use Session;
use Redirect;
use App\Customers;
use App\User;
use App\Transactions;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Redirector;
use App\Branch;


class BanksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Banks  $banks
     * @return \Illuminate\Http\Response
     */
    public function show(Banks $banks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Banks  $banks
     * @return \Illuminate\Http\Response
     */
    public function edit(Banks $banks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Banks  $banks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banks $banks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Banks  $banks
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banks $banks)
    {
        //
    }

    public function g_addbank($id=null){

        $user = Auth::user();

        if(!$user){
            return redirect('betabet/login');
        }

        $name = Customers::where("user_id",$user->id)->first();

        $bank = Banks::where("user_id",$user->id)->get();



        return view('betabet/addbank', compact("name","id",'bank'));
    }

    public function p_addbank(Request $request){

        if(empty($request->input("account_number")) ){
            Session::flash('error', 'Account Number is Empty');
            return back();
        }

        if( Banks::where("account_number",$request->input("account_number"))->first()){
            Session::flash('error' , 'Account Number Already Exist');
            return back();
        }

        if(empty($request->input("bank_name")) ){
            Session::flash('error', 'Bank Name is Empty');
            return back();
        }

        if(empty($request->input("account_name")) ){
            Session::flash('error', 'Account Name is Empty');
            return back();
        }

        $user = Auth::user();

        $bank = new Banks;

        $bank->account_name = $request->input('account_name') ;

        $bank->account_type = $request->input('account_type') ;

        $bank->account_number = $request->input('account_number') ;

        $bank->bank_name = $request->input('bank_name') ;

        $bank->user_id = $user->id ;

        $bank->flag = 1 ;//live 0 deleted

        $bank->status = 2 ; //2 unverified 1 verified

        if($bank->save()){
            Session::flash('success', 'Congrats! New Account Added Admin will approve it and you will be notified');
            return redirect('betabet/index');
        }
        else{
            Session::flash('error', 'Ooops! An error occured pls try agian later');
            return back();
        }
    }

    public function g_editbank($id=null){

        $user = Auth::user();

        if(!$user){
            return redirect('betabet/login');
        }

        $name = Customers::where("user_id",$user->id)->first();

        $bank = Banks::where("id", $id)->first();



        return view('betabet/editbank', compact("name","id",'bank'));
    }

    public function  p_delete_bank(){
        $id = request()->id;

        $branch = Banks::findOrFail($id);
        $branch->flag = 0;


        if ($branch->save()) {

            Session::flash('delete', 'Congrats! Unit record saved');
            return redirect('/betabet/index');

        }else{
            Session::flash('error', 'Sorry! Unit cant be deleted try again');
            return redirect('/admin/units');

        }



    }


}
