<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{

    public function index()
    {
        return view('home');
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $post = new Post();
        return $this->update($request, $post);
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => ''
        ]);

        $post->title = $data['title'];
        $post->description = $data['description'];
        $post->user_id = Auth::user()->id;
        $post->save();

        return redirect('/home');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return view('home');
    }
}
