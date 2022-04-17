<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


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

    public function store()
    {
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        auth()->user()->posts()->create([
            'title' => $data['title'],
            'description' => $data['descripion'],
        ]);

        return redirect('/home');
    }
}
