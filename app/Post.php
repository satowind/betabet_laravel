<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = [
        'post_id', 'title', 'content','post_category', 'images', 'status','flag', 'tag', 'time'
    ];

    public $timestamps = false;
}
