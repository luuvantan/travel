<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Provincial;
use App\Models\Category;
use App\Http\Requests\CreatePost;

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
        $news = Post::with('user:id,name,avatar')->orderBy('created_at', 'DESC')->paginate(8);
        $suggests = Post::with('user:id,name,avatar')->orderBy('created_at', 'DESC')->paginate(8);
        $highlights = Post::with('user:id,name,avatar')->orderBy('created_at', 'DESC')->paginate(8);

        return view("homes.overview", \compact('news', 'suggests', 'highlights'));
    }
}
