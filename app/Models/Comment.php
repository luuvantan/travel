<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function post()
    {
        return $this->belongsTo('App\Models\Post', 'id', 'post_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id', 'user_id');
    }
}
