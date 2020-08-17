<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Response_comment extends Model
{
    public function comment()
    {
        return $this->belongsTo('App\Models\Comment', 'comment_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
