<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\CreatePost;
use App\Models\User;
use App\Events\NotificationEvent;
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

        $pusher = new \Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            [
                'cluster' => 'ap1',
                'encrypted' => false
            ]
        );

        // $pusher = new \Pusher(
        //     '3a4ce77f72008aee06d5',
        //     'f5dc1c7b760fd541a8f6',
        //     '1052523',
        //     [
        //         'cluster' => 'ap1',
        //         'encrypted' => false
        //     ]
        //   );

        $pusher->trigger('SendMessage', 'send-message', $data);

        return view('layouts.notification');
    }
}
