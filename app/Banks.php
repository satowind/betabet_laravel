<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banks extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'account_number',
        'account_name',
        'bank_name',
        'user_id',
        'flag',
        'account_type'
    ];

    protected $primaryKey = 'id';

    public $incrementing = false;

    public $timestamps = false;

    public $remember_token=false;

    protected $table = 'banks';

    /**
     * A Customers can have many interests.
     * Get interests associated with the customer.
     *
     * @return \Illuminate\Database\Eloquent\BelongsToOne
     */

}
