@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="card mx-auto mt-4">
                <div class="card-header">
                    Edit status
                </div>
                <div class="card-body">
                    <form action="/posts/{{ $post->id }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <label for="title">Title</label>
                        <input type="text" name="title" class="mb-3 @error('title') is-invalid @enderror"
                        value = {{ old('title') ?? $post->title }}
                        required autofocus>
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <textarea name="description" id="textArea" cols="70">
                            {{ old('description') ?? $post->description }}
                        </textarea>
                        <button class="btn btn-primary">Add Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection