<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\CreatePost;
use App\Models\User;
use Pusher\Pusher;

class SendNotificationController extends Controller
{
    public function create()
    {
        return view('layouts.notification');
    }

    public function store(Request $request)
    {
        $user = User::find(3); 
        $data = $request->only([
            'title',
            'content',
        ]);
        $user->notify(new CreatePost($data));

        return view('layouts.notification');
    }
}
