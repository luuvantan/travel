<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Vote;
use App\Models\Provincial;
use App\Models\Category;
use App\Http\Requests\CreatePost;
use App\Helpers\Crawler;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $test = new Crawler();
        // list($t, $g) = $test->Crawls("https://blogyeuphuot.com/kinh-nghiem-phuot-ta-xua-san-may-thoa-suc-check-in-song-ao.html");
        // dd($t, $g);
        $posts = Post::all();

        return view('Posts.index', compact('posts'));
    }

    //pagePost
    public function pagePost(Request $request, $title, $post_id)
    {
        $user_id = \Auth::id();
        $post = Post::with('user:id,name,avatar,email')
                ->where('id', $post_id)->first();

        $news = Post::whereNotIn('id', [$post_id])->orderBy('created_at', 'DESC')->paginate(8);

        $votes = Vote::where('post_id', $post_id);
        $countVote = $votes->get()->count('id');
        $sumVote = $votes->get()->sum('vote');
        $average = ($countVote>0) ? round($sumVote/$countVote, 1) : 0;
        $userVote = (!empty($user_id) && $countVote >0) ? $votes->where('user_id', $user_id)->select('vote')->first() : 0;
        $comments = Comment::with(['user:id,name,avatar,email', 'response_comment'])
                    ->where('post_id', $post_id)
                    ->orderBy('created_at', 'DESC')->get();

        return view('Posts.index', compact('post', 'news', 'countVote', 'average', 'userVote', 'comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provincials = Provincial::orderBy('name')->get();
        $categorys = Category::all();

        return view('Posts.create', \compact('provincials', 'categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePost $request)
    {
        $post = new Post;
        $post->user_id = \Auth::user()->id;
        $post->title = $request['title'];
        $post->provincial_id = $request['provincial_id'];
        $post->category_id = $request['category_id'];
        $post->place = $request['place'];
        $post->content = $request['text'];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $filePath = 'public/'. $request['category_id']. '/' . $request['provincial_id'] . '/' . $name;
            \Storage::put($filePath, file_get_contents($image));

            $post->url_img = \Storage::url($filePath);
        }
        $post->save();

        return redirect()->route('page.post', ['title' => \Str::slug($post->title), 'id' => $post->id])->with('alert-success', 'create success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data = $request->only(['checkUser', 'post_id', 'name']);
        if ($data['checkUser']) {
            $post = Post::findOrFail($data['post_id']);
            $post->delete();

            return redirect()->route('profile.showProfile', ['name' => $data['name']])->with('thongbao', 'Xóa post thành công');
        }
        return abort('404');

    }

    /**
     * Search by name or title or content.
     *
     * @param  $request
     *
     * @return void
     */
    public function searchByValue(Request $request)
    {
        $param = $request->only(['value']);
        $searchs = Post::where(function ($query) use ($param) {
            return $query->where('name', 'like', '%' . $param['value'] . '%')
                ->orWhere('title', 'like', '%' . $param['value'] . '%')
                ->orWhere('content', 'like', '%' . $param['value'] . '%')
                ->orWhere('title', 'like', '%' . $param['value'] . '%');
        })->get();

        return response()->json($searchs);
    }
}
