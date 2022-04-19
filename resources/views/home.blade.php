@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="card mx-auto mt-4 mb-2">
                <div class="card-header">
                    Post a new status
                </div>
                <div class="card-body">
                    <form action="/home" method="POST">
                        @csrf
                        <label for="title">Title</label>
                        <input type="text" name="title" class="mb-3">
                        <textarea name="description" id="textArea" cols="70"></textarea>
                        <button class="btn btn-primary">Add Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-7">
            
                @foreach (App\Models\Post::all() as $post)
                    <div class="card mt-3">
                        @if (Auth::check())
                            <div class="card-header">{{ $post->title . ' by ' . $post->user->username}}</div>
                        @endif
                        <div class="card-body">{{ $post->description }}</div>
                        @if (Auth::check() && Auth::user()->id == $post->user_id)
                            <div class="card-footer">
                                <nav class="nav">
                                    <a href="" class="nav-link"><span><i class="fa-solid fa-eye"> View</i></span></a>
                                    <a href="" class="nav-link"><span><i class="fa-solid fa-pen-to-square"> Edit</i></span></a>
                                    <a href="" class="nav-link"><span><i class="fa-solid fa-circle-minus"> Delete</i></span></a>
                                </nav>
                            </div>
                        @endif
                    </div>
                @endforeach
            
        </div>
    </div>
</div>
@endsection
