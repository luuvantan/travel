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
        return $this->belongsTo('App\Models\Category');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function provincial()
    {
        return $this->belongsTo('App\Models\Provincial');
    }

    public function vote()
    {
        return $this->hasMany('App\Models\Vote');
    }

    public function getSumVoteAttribute()
    {
        return optional($this->vote)->sum('vote');
    }

    public function comment()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function getCountCommentAttribute()
    {
        return optional($this->Comment)->Count('id');
    }
}
