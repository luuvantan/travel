<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Provincial;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $tittle = "Kinh nghiệm >> Ẩm Thực >> Địa điểm";

        return view('experiences.index', \compact('tittle'));
    }

    // ẩm thực
    public function foodAndDrink(request $request)
    {
        $tittle = "Kinh nghiệm >> Cẩm nang du lịch >> Địa điểm";

        return view('foodAndDrinks.index', \compact('tittle'));
    }

    // cẩm nang du lich 
    public function travelHandBook(request $request)
    {
        $tittle = "Kinh nghiệm >> Thông Tin Cần Biết >> Địa điểm";
        $provincials = Provincial::all();
        $hankBook = Post::where('user_id', 1)->paginate(10);
        
        return view('experiences.index', \compact('tittle', 'provincials', 'hankBook'));
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
