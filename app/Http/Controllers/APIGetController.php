<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class APIGetController extends Controller
{
    public function getAllPosts(Request $request) {
        return Post::all();
    }

    public function getSinglePost(Request $request) {

        return Post::all()->where('id', '=', $request->id)->first();
    }

    public function getAllComments(Request $request) {
        return Comment::all();
    }

    public function getSingleComment(Request $request) {
        return Comment::all()->where('id', '=', $request->id)->first();
    }
}
