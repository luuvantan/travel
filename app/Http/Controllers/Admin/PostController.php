<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::with(['category'])
            ->orderBy('status', 'asc')
            ->paginate(config('travel.paginate'));

        return view('admin.post.index', compact('posts'));
    }

    public function changeStatus($id)
    {
        $post = Post::findOrFail($id);
        $post->status = $post->status == 0 ? 1 : 0;
        $post->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('admin.post.list')->with('thongbao', 'Xóa post thành công');
    }
}
