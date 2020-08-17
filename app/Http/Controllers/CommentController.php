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
        $data = Comment::with('user:id,name,avatar,email')
                ->where('id',  $comment->id)->first();

        return response()->json(['data' => $data]);
    }

    //show comment
    public function showComment()
    {

    }

    // addResponseComment
    public function addResponseComment()
    {
        $request->validate([
            'comment'=>'required',
        ]);
        $response_comment = new Response_comment();
        $response_comment->user_id = \Auth::user()->id;
        $response_comment->comment_id = $request['comment_id'];
        $response_comment->content = json_decode($request['content']);
        $response_comment->save();
        $data = Response_comment::with('user:id,name,avatar,email')
                ->where('id',  $response_comment->id)->first();

        return response()->json(['data' => $data]);
    }
}
