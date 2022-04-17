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
                    <form action="" method="POST">
                        @csrf
                        <label for="title">Title</label>
                        <input type="text" name="title" class="mb-3">
                        <textarea name="textArea" id="textArea" cols="70"></textarea>
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
                        <div class="card-header">{{ $post->title }}</div>
                        <div class="card-body">{{ $post->description }}</div>
                    </div>
                @endforeach
            
        </div>
    </div>
</div>
@endsection
