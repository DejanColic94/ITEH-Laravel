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
}
