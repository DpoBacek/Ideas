<?php

namespace App\Http\Controllers;

use App\Models\Ideas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IdeaLikeController extends Controller
{
    public function like(Ideas $idea)
    {
        $liker = auth()->user();
        $liker->likes()->attach($idea);
        return redirect()->route('dashboard')->with('success','Liked successfully.' );
    }

    public function unlike(Ideas $idea)
    {
        $liker = auth()->user();
        $liker->likes()->detach($idea);
        return redirect()->route('dashboard')->with('success','Liked successfully.' );
    }
}
