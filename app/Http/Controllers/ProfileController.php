<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //show profile
    public function showProfile(Request $request, $name)
    {
        return view('profiles.showProfile');
    }

    // manager profile
    public function ownerProfile()
    {

    }
}
