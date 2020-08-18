<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;

class ProfileController extends Controller
{
    //show profile
    public function showProfile($email)
    {
        $userSearch = User::where('email', $email)->first();
        if (empty($userSearch)) {
            return abort(404);
        }
        $userCurrent = Auth::id() ?? 0;
        $isCheckUser = $userSearch->id === $userCurrent;
        if($isCheckUser == true) {
            $postResult = Post::where('user_id', $userSearch->id);
            $posts = $postResult->paginate(config('travel.paginate'));
            $countPost = $postResult->get()->count();
        } else {
            $postResult = Post::where('user_id', $userSearch->id);
            $posts = $postResult->where('status', 1)->paginate(config('travel.paginate'));
            $countPost = $postResult->where('status', 1)->get()->count();
        }

        return view('profiles.showProfile', compact('userSearch', 'posts', 'isCheckUser', 'countPost'));
    }

    // manager profile
    public function ownerProfile()
    {

    }
}
