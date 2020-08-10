<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Post;

class DashboardController extends Controller
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
        $totalUsers = User::get()->count('id');
        $totalPosts = Post::get()->count('id');
        $pendingPosts = Post::where('status', 0)->get()->count('id');

        return view("admin.dashboard", compact('totalUsers', 'totalPosts', 'pendingPosts'));
    }
}
