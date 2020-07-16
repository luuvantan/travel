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
        'url_img',
        'status'
    ];
    
    public function getLinkAttribute()
    {
        return route('page.post', ['title' => \Str::slug($this->title), 'id' => $this->id]);
    }

    public function category()
    {
        return $this->hasOne('App\Models\Category', 'id', 'category_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function provincial()
    {
        return $this->belongsTo('App\Models\Provincial');
    }
}
