@extends('layouts.app')

@section('content')
<div class="container">

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
                <a href="" class="nav-link"><span><i class="fa-solid fa-circle-minus"> Delete</i></span></a>
            </nav>
        </div>
    @endif
</div>            
</div>
@endsection