<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

    public function editProfile(Request $request, $id)
    {
        $profile = Auth::user();

        return view('profiles.edit', \compact('profile'));
    }

    public function updateProfile(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'avatar' => ['image', 'mimes:jpeg,jpg,png,gif', 'max:5120'],
            // 'password' => ['string', 'min:6'],
        ]);

        $user = Auth::user();
        $data['name'] = $request->name;
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $name = time() . '.' . $avatar->getClientOriginalExtension();
            $filePath = 'public/avatar/' . $name;
            \Storage::put($filePath, file_get_contents($avatar));

            $data['avatar'] = \Storage::url($filePath);
        }
        
        $user->update($data);

        return redirect()->route('profile.showProfile', ['email' => $user->email])->with('alert-success', 'Chỉnh sửa profile thành công');
    }
}
