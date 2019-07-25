<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Units extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'staff_unit',
        'funding',	
        'company_structure',
        'chat_update',
        'withdrawal',
        'customers',
        'approve_reg',
        'manage_admin',
        'contact_us',	
        'blogs',
        'social_icons',
        'faq',
        'how_to',
        'contact_us_page'
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
    public function units()
    {
        return $this->belongsToOne('App\Units');
    }
	
}
