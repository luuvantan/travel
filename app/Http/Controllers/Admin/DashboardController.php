<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use DB;

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
        $postByDate = $this->postByDate();
        $postByCategory = $this->postByCategory();

        return view("admin.dashboard", compact('totalUsers', 'totalPosts', 'pendingPosts', 'postByDate', 'postByCategory'));
    }

    public function postByDate()
    {
        $range = \Carbon\Carbon::now();
        $get_range = date_format($range,"Y/m/d");
        $date_range = date_format($range,"d/m/Y");
        $postByDate = Post::select(DB::raw('date(created_at) as getDate'), DB::raw('COUNT(*) as value'))
                    ->where('created_at', '>=', $date_range)
                    ->groupBy('getDate')
                    ->orderBy('getDate', 'ASC')
                    ->get();

        return $postByDate;
    }

    public function postByCategory()
    {
        $postByDate = Post::with('category:id,name')->select(DB::raw('(category_id) as getCategory'), DB::raw('COUNT(*) as value'), 'category_id')
                    ->groupBy('getCategory')
                    ->get();
        // dd($postByDate);            
        return $postByDate;
    }
}
