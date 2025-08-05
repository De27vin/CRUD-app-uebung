<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function updatePost(Post $post, Request $request) {
        if (auth()->user()->id !== $post['user_id']) {
            return redirect('/');
        }

        $incomingInformation = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $incomingInformation['title'] = strip_tags($incomingInformation['title']);
        $incomingInformation['body'] = strip_tags($incomingInformation['body']);

        $post->update($incomingInformation);
        return redirect('/');
        
    }

    public function showEditScreen(Post $post) {
        if (auth()->user()->id !== $post['user_id']) {
            return redirect('/');
        }

        return view('edit-post', ['post' => $post]);
    }

    public function createPost(Request $request) {
        $incomingInformation = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $incomingInformation['title'] = strip_tags($incomingInformation['title']);
        $incomingInformation['body'] = strip_tags($incomingInformation['body']);

        $incomingInformation['user_id'] = auth()->id();
        Post::create($incomingInformation);
        return redirect('/');

    }
}
