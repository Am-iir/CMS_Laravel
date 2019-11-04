@extends('layouts.master')
@section('content')
    <div>
        <h1> Create Post</h1>
        <form method="POST" action="/posts">
            {{csrf_field()}}
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title"  name="title" placeholder="Enter Title">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" id="body" cols="30" rows="7" placeholder="Enter description about your post"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Publish</button>
            </div>
            @include('layouts.errors')



        </form>



    </div>

@endsection
