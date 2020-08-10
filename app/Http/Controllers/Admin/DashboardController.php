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

    public function orderByYear()
    {
        $range = \Carbon\Carbon::now()->subYears(5);
        $orderYear = DB::table('orders')
                    ->select(DB::raw('year(date_order) as getYear'), DB::raw('COUNT(*) as value'))
                    ->where('date_order', '>=', $range)
                    ->groupBy('getYear')
                    ->orderBy('getYear', 'ASC')
                    ->get();

        return view('fdfadmin.chart.get_year', compact('orderYear'));
    }
// function orderByYear() mình sẽ lấy tổng các order trong vòng 5 năm tính từ năm hiện tại và fill vào **bar chart**

    public function postByDay()
    {
        $range = \Carbon\Carbon::now();
        $get_range = date_format($range,"Y/m/d");
        $date_range = date_format($range,"d/m/Y");
        $sumProductDay = Post::where('created_at', '=', $get_range)
                    ->groupBy('date_order')
                    ->first();
        if ($sumProductDay == null)
        {

            return redirect(route('chartYear'))->with('alert',trans('chart.no_order'));
        } else {

        $totalProduct = (INT)($sumProductDay->countProduct);
        $percentProduct = round((100 / $totalProduct), 3);

        $productBuy = DB::table('orders')
                    ->select('products.name as name', DB::raw("SUM(amount) * $percentProduct as y"))
                    ->join('detail_orders', 'orders.id', '=', 'detail_orders.order_id')
                    ->join('products', 'detail_orders.product_id', '=', 'products.id')
                    ->where('date_order', '=', $get_range)                    
                    ->groupBy('product_id')
                    ->get();

        return view('fdfadmin.chart.view_order', compact('productBuy', 'date_range'));

        }            
    }
}
