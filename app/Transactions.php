<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    //

    protected $fillable = [
        'transaction_id',
        'date',
        'amount',
        'report',
        'user_id',
        'user_bank',
        'status',

    ];

    protected $primaryKey = 'id';

    public $incrementing = false;

    public $timestamps = false;

    public $remember_token=false;

    public $table = 'transactions';

}
