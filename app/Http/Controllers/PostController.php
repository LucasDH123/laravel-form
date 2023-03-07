<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

class PostController extends Controller
{
    public function deletionView()
    {
        if ($_GET) {
            $id = $_GET['id'];
        }
        return view('confirm_deletetion', ['id' => $id]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5',
            'content' => 'required|max:200|min:10'
        ]);

        $post = new Post();
        $userID = Auth::id();
        $title = $request->title;
        $content = $request->content;

        $post->title = $title;
        $post->content = $content;
        $post->user_id = $userID;

        $post->save();

        return Redirect::to('/posts')->with('msg', 'Post has been created!');
    }

    public function showAllPosts()
    {
        $post = new Post();

        $allPosts = $post->all();

        return view('postIndex')->with('posts', $allPosts);
    }

    public function showDetail($postid)
    {
        $postModel = new post();
        $commentModel = new Comment();

        $data = $postModel->all()->where('id', '=', $postid)->first();
        $comments = $commentModel->all()->where('post_id', '=', $postid);

        return view('detailPage')
            ->with('post', $data)
            ->with('comments', $comments);
    }

    public function editPost(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5',
            'content' => 'required|max:200|min:10'
        ]);

        $target = Post::find($request->id);
        if ($this->authorize('update', $target)) {
            $target->title = $request->title;
            $target->content = $request->content;

            $target->save();

            return Redirect::to('/posts');
        }
    }

    public function deletepost()
    {
        $target = Post::find($_GET['post_id']);
        if ($this->authorize('delete', $target)) {
            $target->delete();
            return Redirect::to('/posts');
        }
    }
}
