<?php

namespace App\Http\Controllers;

use App\Models\Ideas;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Ideas $idea)
    {
        \request()->validate([
            'content_'.$idea->id => 'required'
        ]);
        $comment = new Comment();
        $comment->idea_id = $idea->id;
        $comment->user_id = auth()->id();
        $comment->content = \request()->get('content_'.$idea->id);
        $comment->save();

        return redirect()->back()->with('success', 'Comment posted successfully.');
    }
    public function destroy(Ideas  $idea,Comment $id)
    {
        $id->delete();
        return redirect()->back()->with('success', 'Comment Delete successfully.');
    }
}
