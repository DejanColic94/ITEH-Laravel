<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function createPost(Request $request) {
        $userInput = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $userInput['title'] = strip_tags($userInput['title']);
        $userInput['body'] = strip_tags($userInput['body']);
        $userInput['user_id'] = auth()->id();

        Post::create($userInput);
        return redirect('/');
    }

    public function showEditScreen(Post $post) {

        if(auth()->user() === null || auth()->user()->id !== $post['user_id']) {
            return redirect('/');
        }

        return view('edit-post',['post' => $post]);
    }

    public function updatePost(Post $post, Request $request) {
        if(auth()->user()->id !== $post['user_id']) {
            return redirect('/');
        }

        $userInput = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $userInput['title'] = strip_tags($userInput['title']);
        $userInput['body'] = strip_tags($userInput['body']);

        $post->update($userInput);
        return redirect('/');
    }
}
