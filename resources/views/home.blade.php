@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="card mx-auto mt-4">
                <div class="card-header">
                    Post a new status
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <textarea name="textArea" id="textArea" cols="70"></textarea>
                        <button class="btn btn-primary">Add Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        
    </div>
</div>
@endsection
