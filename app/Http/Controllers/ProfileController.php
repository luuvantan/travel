<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;

class ProfileController extends Controller
{
    //show profile
    public function showProfile($name)
    {
        $userSearch = User::where('name', $name)->first();
        if (empty($userSearch)) {
            return abort(404);
        }
        $userCurrent = Auth::user();
        $isCheckUser = $userSearch->id === $userCurrent->id;
        $posts = Post::where('user_id', $userSearch->id)->paginate(config('travel.paginate'));

        return view('profiles.showProfile', compact('userSearch', 'posts', 'isCheckUser'));
    }

    // manager profile
    public function ownerProfile()
    {

    }
}
