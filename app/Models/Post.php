<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'name',
        'category_id',
        'provincial_id',
        'place',
        'title',
        'content',
        'url_img'
    ];
}
