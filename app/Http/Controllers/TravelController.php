<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Provincial;
use Illuminate\Support\Str;

class TravelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return redirect()->route('travels.northern');
    }

    // mien bac
    public function northern(Request $request)
    {
        $title = "Du Lịch >> Miền Bắc >> Địa điểm";
        $provincials = Provincial::where('region_id', 1)->orderBy('name')->get();
        $filterProvincial = $request->provincial ?? '';
        $provincialId = Provincial::where('name', $filterProvincial)->pluck('id')->first();
        if(empty($provincialId)) {
            $datas = Post::join('provincials', function ($query) {
                        $query->on('posts.provincial_id', '=', 'provincials.id')
                        ->where('region_id', 1);
                    })->where('status', 1)->paginate(10);
            // ->where('category_id', 3)     
        } else {
            $datas = Post::join('provincials', function ($query) {
                        $query->on('posts.provincial_id', '=', 'provincials.id')
                        ->where('region_id', 1);
                    })->where('provincial_id', $provincialId)
                    ->where('status', 1)->paginate(10);
        }

        return view('travels.index', \compact('title', 'provincials', 'datas'));
    }

    // mien trung
    public function central(Request $request)
    {
        $title = "Du Lịch >> Miền Trung >> Địa điểm";
        $provincials = Provincial::where('region_id', 2)->orderBy('name')->get();
        $filterProvincial = $request->provincial ?? '';
        $provincialId = Provincial::where('name', $filterProvincial)->pluck('id')->first();
        if(empty($provincialId)) {
            $datas = Post::join('provincials', function ($query) {
                        $query->on('posts.provincial_id', '=', 'provincials.id')
                        ->where('region_id', 2);
                    })->where('status', 1)->paginate(10);
        } else {
            $datas = Post::join('provincials', function ($query) {
                        $query->on('posts.provincial_id', '=', 'provincials.id')
                        ->where('region_id', 2);
                    })->where('provincial_id', $provincialId)->where('status', 1)->paginate(10);
        }
        
        return view('travels.index', \compact('title', 'provincials', 'datas'));
    }

    // mien nam
    public function southern(Request $request)
    {
        $title = "Du Lịch >> Miền Nam >> Địa điểm";
        $provincials = Provincial::where('region_id', 3)->orderBy('name')->get();
        $filterProvincial = $request->provincial ?? '';
        $provincialId = Provincial::where('name', $filterProvincial)->pluck('id')->first();
        if(empty($provincialId)) {
            $datas = Post::join('provincials', function ($query) {
                        $query->on('posts.provincial_id', '=', 'provincials.id')
                        ->where('region_id', 3);
                    })->where('status', 1)->paginate(10);
        } else {
            $datas = Post::join('provincials', function ($query) {
                        $query->on('posts.provincial_id', '=', 'provincials.id')
                        ->where('region_id', 3);
                    })->where('status', 1)->where('provincial_id', $provincialId)->paginate(10);
        }
        
        return view('travels.index', \compact('title', 'provincials', 'datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
