<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use Illuminate\Support\Facades\Redirect;

class CommentController extends Controller
{
    public function store(Request $request) {

        $request->validate([
            'content' => 'required|max:250|'
        ]);

        $comment = new Comment;
        $userID = Auth::id();
       

        $comment->content = $request->content;
        $comment->post_id = $request->post_id;
        $comment->user_id = $userID;

        $comment->save();

        return Redirect::to('/');
    }
}
