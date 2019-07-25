<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'name',
        'phone',	
        'email',
        'staff_id',
        'staff_unit',
        'branch',
        'staff_unit_id',
        'user_id'
    ];

    protected $primaryKey = 'id';

    public $incrementing = false;

    public $timestamps = false;

	public $remember_token=false;

    /**
     * A Customers can have many interests.
     * Get interests associated with the customer.
     *
     * @return \Illuminate\Database\Eloquent\BelongsToOne
     */
    public function users()
    {
        return $this->belongsToOne('App\User');
    }
	
}
