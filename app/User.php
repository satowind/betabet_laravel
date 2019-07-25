<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Route;

class User extends Authenticatable
{
    use Notifiable;
	
	// Set timestamp to false

	public $timestamps = false;

	//public $remember_token=false;

	//Map this model to user table
	
	protected $table = 'users';
	
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */ 
	 
    protected $fillable = [
        'username', 'password', 'user_type','remember_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    

	
	public static function usernameExist($username){
		
		$user = User::where('username', $username)->first();

			if($user != null){
				return true;
			}else{
				return false;
			}	
	}	


	
}
