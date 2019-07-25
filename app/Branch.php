<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'address',
        'phone',
        'email',
        'name',
        'city',
        'state',
        'lga',
        'hierachy',
        'country',
        'under',
        'bet9ja_id',
        'bet9ja_code',
        'rank',
        'heirachy_id'
    ];

    protected $primaryKey = 'id';

    public $incrementing = false;

    public $timestamps = false;

    public $remember_token=false;
    public $table = 'branch';

    /**
     * A Customers can have many interests.
     * Get interests associated with the customer.
     *
     * @return \Illuminate\Database\Eloquent\BelongsToOne
     */
//    public function branch()
//    {
//        return $this->belongsToOne('App\Branch');
//    }
}
