<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vote;

class VoteController extends Controller
{
    public function showVote(Request $request)
    {
        $votes = Vote::get();
    }

    public function addVote(Request $request)
    {
        $value = $request->value;
        $post_id = $request->post_id;
        $user_id = \Auth::id();
        $vote = Vote::where('post_id', $post_id)->where('user_id', $user_id)->first();
        if(!empty($vote)) {
            $vote->vote = $value;
            $vote->save();
        } else {
            $vote = new Vote();
            $vote->post_id = $post_id;
            $vote->user_id = $user_id;
            $vote->vote = $value;
            $vote->save();
        }

        $countVote = Vote::where('post_id', $post_id)->count('id');
        $sumVote = Vote::where('post_id', $post_id)->sum('vote');
        $average = round($sumVote/$countVote, 1);

        return response()->json(['average' => $average, 'countVote' => $countVote]);
    }
}
