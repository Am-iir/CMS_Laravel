
@extends('layouts.master')

@section('content')
    <h1> Edit Post</h1>
    <form action="/posts/{{$post->id}}" method="POST">
        {{method_field('PATCH')}}
        {{csrf_field()}}
        <div class="form-group">
            <input type="text" class="form-control" name="title" value="{{$post->title}}" placeholder="Project Title">

        </div>

        <div class="form-group">
            <textarea name="description" class="form-control" id="" cols="30" rows="10">{{$post->description}}</textarea>
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary"  value="Update">
        </div>

    </form>


@endsection
