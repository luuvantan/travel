<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Vote;
use App\Models\Provincial;
use App\Models\Category;
use App\Http\Requests\CreatePost;
use App\Http\Requests\EditPost;
use App\Helpers\Crawler;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

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
        // $t = $test->getUrlCrawl("https://blogyeuphuot.com/phuot-mien-bac");
        // dd($t);
        $posts = Post::all();

        return view('Posts.index', compact('posts'));
    }

    //pagePost
    public function pagePost(Request $request, $title, $post_id)
    {
        $user_id = \Auth::id();
        $post = Post::with('user:id,name,avatar,email')->with('provincial')
                ->where('id', $post_id)->first();
        $region_id = $post->provincial->region_id;
        $provincial_id = $post->provincial_id;

        $news = Post::whereNotIn('id', [$post_id])->orderBy('created_at', 'DESC')->paginate(8);

        $relations = Post::whereHas('provincial', function (Builder $query) use($region_id, $provincial_id) {
            $query->where('id', $provincial_id)->orWhere('region_id', $region_id);
        })->whereNotIn('id', [$post_id])->take(8)->get();

        $votes = Vote::where('post_id', $post_id);
        $countVote = $votes->get()->count('id');
        $sumVote = $votes->get()->sum('vote');
        $average = ($countVote>0) ? round($sumVote/$countVote, 1) : 0;
        $userVote = (!empty($user_id) && $countVote >0) ? $votes->where('user_id', $user_id)->select('vote')->first() : 0;
        $comments = Comment::with(['user:id,name,avatar,email', 'response_comment'])
                    ->where('post_id', $post_id)
                    ->orderBy('created_at', 'DESC')->get();

        return view('Posts.index', compact('post', 'news', 'countVote', 'average', 'userVote', 'comments', 'relations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Tạo bài viết";
        $provincials = Provincial::orderBy('name')->get();
        $categorys = Category::where('id', '!=', 3)->get();

        return view('Posts.create', \compact('title', 'provincials', 'categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePost $request)
    {
        $getEmail = \Auth::user()->email;
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

        return redirect()->route('profile.showProfile', ['email' => $getEmail])->with('alert-success', 'Thêm bài viết thành công');
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
        $title = "Sửa bài viết";
        $provincials = Provincial::orderBy('name')->get();
        $categorys = Category::where('id', '!=', 3)->get();
        $post = Post::find($id);

        return view('Posts.edit', \compact('title', 'provincials', 'categorys', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditPost $request, $id)
    {
        $getEmail = \Auth::user()->email;
        $post = Post::find($id);
        $data['title'] = $request['title'];
        $data['provincial_id'] = $request['provincial_id'];
        $data['category_id'] = $request['category_id'];
        $data['place'] = $request['place'];
        $data['content'] = $request['text'];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $filePath = 'public/'. $request['category_id']. '/' . $request['provincial_id'] . '/' . $name;
            \Storage::put($filePath, file_get_contents($image));

            $data['url_img'] = \Storage::url($filePath);
        }

        if($post->update($data)) {

            return redirect()->route('profile.showProfile', ['email' => $getEmail])->with('alert-success', 'Chỉnh sửa bài viết thành công');
        }

        return redirect()->route('profile.showProfile', ['email' => $getEmail])->with('alert-danger', 'Chỉnh sửa bài viết thất bại');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data = $request->only(['checkUser', 'post_id', 'email']);
        if ($data['checkUser']) {
            $post = Post::findOrFail($data['post_id']);
            $post->delete();

            return redirect()->route('profile.showProfile', ['email' => $data['email']])->with('alert-success', 'Xóa post thành công');
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
        $searchs = Post::where('title', 'like', '%' . $param['value'] . '%')->limit(5)->get();

        return response()->json($searchs);
    }
}
