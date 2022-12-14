<?php

namespace App\Http\Controllers;

use App\Models\LikesDislikes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeDislike extends Controller
{
    public function like(Request $request)
    {
        // $userid = Auth::user();
        // pass dynamic user id use Auth
        $likedislike = new LikesDislikes();
        // $likedislike->user_id = $userid;
        $likedislike->movie_id = $request->input('movie_id');
        $likedislike->save();
        return redirect()->back()->with('message','Post Liked Successfully');
    }
}
