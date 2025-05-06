<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable=[

        'body',
        'user_id',
        'post_id',
    ];
    


    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    
}