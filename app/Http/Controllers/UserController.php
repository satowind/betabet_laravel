<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use Session;
use Redirect;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Mail;

class UserController extends Controller{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
    
        // Get all users 
        $users = User::all();

        return response()->json(['error' => false, 'users' => $users], 200);
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
	public function login(Request $request){

    	$username = $request->input('username');

    	$password = $request->input('password');

    	if (Auth::attempt(['username' => $username, 'password' => $password])){
    		//Authentication passed...

    		$user = Auth::user();

            /*if($user->status != '1'){
                Session::flash('error', 'One last step! Pls go to ur email and click the link we sent you');
        
                return back();
            } */  

    		return redirect('profile')->with('user', $user);

    	}else{		

			//Authentication Failed 
			Session::flash('error', 'Ooops! Invalid login details supplied');
		
			return back();
		
		}

    }


    public function profile(){

    	$user = Auth::user();

    	return view('profile')->with('user', $user);
    }

    public function resetMail(Request $request){

        
        $email = $request->input('email');

        $user = User::where('email', $email)->first();
        
        $user_id = $user->id;

        $token = time();

        $user = User::where('id', $user_id)->first();

        $user->token = $token;

        $user->save();
        
        $sender = 'yinka@theaffinityclub.com';
        
        
 
        $data = [
        'email'=> $email,
        'token'=> $token,
        'date'=>date('Y-m-d')
        
        
        ];
 
        Mail::send('reset-password', $data, function($message) use($data){
            
            $message->from('yinka@theaffinityclub.com', 'Labisys');
            $message->SMTPDebug = 4; 
            $message->to($data['email']);
            $message->subject('Password Recovery');
 
            Session::flash('success', 'An Email has been sent to your account. Pls check to proceed');
        
            return view('login');
        });
    }    
    

    public function logout(){

    	Auth::logout();
        
        return redirect('login');
    }
    
    
    
}
