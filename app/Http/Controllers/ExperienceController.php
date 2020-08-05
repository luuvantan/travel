<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Provincial;
use Illuminate\Support\Str;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        return redirect()->route('experiences.food-and-drink');
    }

    // ẩm thực
    public function foodAndDrink(request $request)
    {
        $title = "Kinh nghiệm >> Ẩm Thực >> Địa điểm";
        $provincials = Provincial::orderBy('name')->get();
        $filterProvincial = $request->provincial ?? '';
        $provincialId = Provincial::where('name', $filterProvincial)->select('id')->first();
        if(empty($provincialId)) {
            $datas = Post::with('user:id,name,avatar')->where('category_id', 1)
                    ->paginate(5);
        } else {
            $provincialId = Provincial::where('name', $filterProvincial)->select('id')->first();
            $datas = Post::with('user:id,name,avatar')->where('category_id', 1)
                    ->where('provincial_id', $provincialId['id'])
                    ->paginate(5);
        }
        

        return view('experiences.index', \compact('title', 'provincials', 'datas'));
    }

    // cẩm nang du lich 
    public function travelHandBook(request $request)
    {
        $title = "Kinh nghiệm >> Cẩm nang du lịch >> Địa điểm";
        $provincials = Provincial::orderBy('name')->get();
        $filterProvincial = $request->provincial ?? '';
        
        if(empty($provincialId)) {
            $datas = Post::with('user:id,name,avatar')->where('category_id', 4)
                    ->paginate(5);
        } else {
            $provincialId = Provincial::where('name', $filterProvincial)->select('id')->first();
            $datas = Post::with('user:id,name,avatar')->where('category_id', 4)
                    ->where('provincial_id', $provincialId['id'])
                    ->paginate(5);
        }
        
        return view('experiences.index', \compact('title', 'provincials', 'datas'));
    }

    public function information(Request $request)
    {
        $title = "Kinh nghiệm >> Thông Tin Cần Biết >> Địa điểm";
        $provincials = Provincial::orderBy('name')->get();
        $datas = Post::where('user_id', 1)->paginate(5);
        
        return view('experiences.index', \compact('title', 'provincials', 'datas'));
    }

    public function search($request)
    {

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
