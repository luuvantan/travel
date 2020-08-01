<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class CommentController extends Controller
{
    //add comment
    public function addComment(Request $request)
    {
        $request->validate([
            'comment'=>'required',
        ]);
        $comment = new Comment();
        $comment->user_id = \Auth::user()->id;
        $comment->post_id = $request['post_id'];
        $comment->content = json_decode($request['comment']);
        $comment->save();
    }

    //show comment
    public function showComment()
    {

    }
}
