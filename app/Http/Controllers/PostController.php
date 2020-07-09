<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Provincial;
use App\Models\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('Posts.index', compact('posts'));
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
    public function store(Request $request)
    {
        $t = $request->editorContent;
        $post = new Post;
        $post->user_id = '1';
        $post->category_id = '1';
        $post->provincial_id = '1';
        $post->content = $request['text'];
        $post->save();

        return view('Posts.create');
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
                ->orWhere('content', 'like', '%' . $param['value'] . '%');
        })->get();

        return response()->json($searchs);
    }
}
