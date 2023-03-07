<?php

namespace App\Http\Controllers;

use App\Models\Post as ModelsPost;
use Illuminate\Http\Request;
use Illuminate\Auth\Middleware\Authenticate AS Auth;
use App\Models\Post;

class ViewController extends Controller
{
    public function mainView() {
        return view('main');
    }

    public function loginView() {

        return view('login');
    }

    public function registerView() {
        return view('register');
    }

    public function postView() {
        return view('postIndex');
    }

    public function createPostView() {
        return view('createPost');
    }

    public function createCommentView() {
        return view('CreateComment');
    }

    public function updatePostView($id) {
        $post = new Post;
        $targetPost = $post->all()->where('id', '=', $id)->first();
        return view('updatePost', ['post' => $targetPost]);
    }
    
}
