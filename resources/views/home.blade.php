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
                        <input type="text" name="title" class="mb-3 @error('title') is-invalid @enderror">
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <textarea name="description" id="textArea" cols="70"></textarea>
                        <button class="btn btn-primary">Add Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-7">
            
                @foreach (App\Models\Post::all()->sortByDesc("created_at") as $post)
                    <div class="card mt-3">
                        @if (Auth::check())
                            <div class="card-header">{{ $post->title . ' by ' . $post->user->username}}</div>
                        @endif
                        <div class="card-body">{{ $post->description }}</div>
                        @if (Auth::check() && Auth::user()->id == $post->user_id)
                            <div class="card-footer">
                                <nav class="nav">
                                    <a href="/posts/{{ $post->id }}" class="nav-link"><span><i class="fa-solid fa-eye"> View</i></span></a>
                                    <a href="/posts/{{ $post->id }}/edit" class="nav-link"><span><i class="fa-solid fa-pen-to-square"> Edit</i></span></a>
                                    <form action="/posts/{{ $post->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="nav-link btn text-danger"><span><i class="fa-solid fa-circle-minus"> Delete</i></span></button>
                                    </form>  
                                </nav>
                            </div>
                        @endif
                    </div>
                @endforeach
            
        </div>
    </div>
</div>
@endsection
