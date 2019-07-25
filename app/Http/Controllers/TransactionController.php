<?php

namespace App\Http\Controllers;

use App\Banks;
use App\Customers;
use App\Units;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Route;

use Session;
use Redirect;
use App\Admin;
use App\User;
use App\Transactions;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Redirector;

class TransactionController extends Controller
{
    //
    public function g_fund_table($id=null){
        $admin = new Admin;
        $user = Auth::user();
        if(!$user){
            return redirect('admin/login');
        }

        $name = Admin::where("user_id",$user->id)
            ->first();


        $transaction = Transactions::where('report','1')
            ->join('customers', 'customers.user_id', '=', 'transactions.user_id')
            ->join('banks', 'banks.id', '=', 'transactions.bank_id')
            ->select('transactions.*','customers.*', 'banks.bank_name')
            ->get() ;

        $privillage = Units::where('id',$name->staff_unit_id)->first();

        return view('admin/fundTable', compact("name","id", 'transaction', 'users','privillage'));
    }

    public function g_with_table($id=null){
        $admin = new Admin;
        $user = Auth::user();
        if(!$user){
            return redirect('admin/login');
        }

        $name = Admin::where("user_id",$user->id)
            ->first();


        $transaction = Transactions::where('report','2')
            ->join('customers', 'customers.user_id', '=', 'transactions.user_id')
            ->join('banks', 'banks.id', '=', 'transactions.bank_id')
            ->select('transactions.*','customers.*', 'banks.bank_name')
            ->get() ;

        $privillage = Units::where('id',$name->staff_unit_id)->first();

        return view('admin/withTable', compact("name","id", 'transaction', 'users','privillage'));
    }

    public function g_fund(){

        $user = Auth::user();

        if(!$user){
            return redirect('betabet/login');
        }

        $name = Customers::where("user_id",$user->id)
            ->first();

        $bank = Banks::where("user_id",$user->id)
            ->where('flag','!=',0)
            ->where('status',1)
            ->get();

        return view('betabet/fund', compact("name","id",'bank'));

    }

    public function g_withdraw(){

        $user = Auth::user();

        if(!$user){
            return redirect('betabet/login');
        }

        $name = Customers::where("user_id",$user->id)
            ->first();

        $bank = Banks::where("user_id",$user->id)
            ->where('flag','!=',0)
            ->where('status',1)
            ->get();

        return view('betabet/withdraw', compact("name","id",'bank'));

    }

    public function g_with(){

        $user = Auth::user();

        if(!$user){
            return redirect('betabet/login');
        }

        $name = Customers::where("user_id",$user->id)
            ->first();

        $bank = Banks::where("user_id",$user->id)
            ->where('flag','!=',0)
            ->where('status',1)
            ->get();

        return view('betabet/with', compact("name","id",'bank'));

    }

    public function p_withdraw(){

        $amount = request()->amount;
        $bank = request()->bank;
        $user_id = request()->user_id;




        $transaction = new Transactions;

        $transaction->amount = $amount;

        $transaction->transaction_id = "WT".time();
        $transaction->bank_id = $bank;

        $transaction->user_id = $user_id;
        $transaction->report = 2;//withdrawal
        $transaction->status = 1; //pending


        if ($transaction->save()) {

            Session::flash('delete', 'Congrats! Unit record saved');
            //return redirect('/admin/units');

        }else{

            Session::flash('error', 'Sorry! Unit cant be deleted try again');
            //return redirect('/admin/units');

        }

    }

    public function p_fund(){

        $amount = request()->amount;
        $bank = request()->bank;
        $user_id = request()->user_id;


        /** @var  new instance of transaction $transaction */
        $transaction = new Transactions;

        $transaction->amount = $amount;

        $transaction->transaction_id = "WT".time();
        $transaction->bank_id = $bank;

        $transaction->user_id = $user_id;
        $transaction->report = 1;//fund
        $transaction->status = 1; //pending


        if ($transaction->save()) {

            Session::flash('delete', 'Congrats! Unit record saved');
            //return redirect('/admin/units');

        }else{

            Session::flash('error', 'Sorry! Unit cant be deleted try again');
            //return redirect('/admin/units');

        }

    }

}
