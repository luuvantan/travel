<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index(Request $request)
    {
         $postId = $request->only(['postId']);
         $comments = Comment::with(['user', 'post'])->where('post_id', $postId)
             ->orderBy('created_at', 'desc')
             ->paginate(config('travel.paginate'));

         return view('admin.comment.index', compact('comments'));
    }

    public function destroy(Request $request)
    {
        $data = $request->only(['id', 'postId']);
        $comment = Comment::findOrFail($data['id']);
        $comment->delete();

        return redirect()->route('admin.comment.list', ['postId' => $data['postId']])->with('thongbao','Xóa comment thành công');
    }
}
