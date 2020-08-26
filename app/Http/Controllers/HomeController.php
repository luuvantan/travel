<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Post;
use App\Models\Provincial;
use App\Models\Category;
use App\Http\Requests\CreatePost;
use App\Models\Vote;
use App\Models\Commnet;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $title = "Trang chủ";
        $news = Post::with('user:id,name,avatar,email')
            ->where('status', 1)
            ->orderBy('created_at', 'DESC')
            ->take(8)->get();

        // $suggests = Post::with('user:id,name,avatar,email')
        //     ->where('status', 1)
        //     ->get()
        //     ->sortByDesc('countComment')->take(8);
        $suggests = Post::with('user:id,name,avatar,email')
            ->join('comments', 'posts.id', 'comments.post_id')
            ->select('posts.id', 'posts.user_id', 'posts.name', 'posts.category_id', 'posts.provincial_id',
            'posts.place', 'posts.title', 'posts.content', 'posts.url_img', 'posts.status',
            'comments.id as comment_id', 'comments.created_at as comment_create')
            ->where('posts.status', 1)
            ->groupBy('posts.id')
            ->orderBy('comment_create', 'DESC')
            ->take(8)->get();

        $dataHighlights = Post::with('user:id,name,avatar,email')
            ->where('status', 1)
            ->with(['vote'])->get()
            ->sortByDesc('sumVote');

        $highlights = $this->customPaginate($dataHighlights);
        // dd($highlights, $suggests);

        return view("homes.overview", \compact('title', 'news', 'suggests', 'highlights'));
    }

    public function customPaginate($items, $perPage = 12, $page = null, $options = [])
    {
        $base_url = env('APP_URL') . '/';
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        $highlights = new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
        
        return $highlights->setPath($base_url . 'homes/');
    }

    public function aboutMe()
    {
        $title = "Về chúng tôi";
        return view("layouts.introduce", \compact('title'));
    }
}
