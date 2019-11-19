
@extends('layouts.admin')

@section('content')
    <h1> Edit Tag</h1>
    <form action="{{route('admin.tags.update' , $tag->id)}}" method="POST">
        {{method_field('PATCH')}}
        {{csrf_field()}}
        <div class="form-group">
            <input type="text" class="form-control" name="name" value="{{$tag->name}}" placeholder="Project Title">

        </div>

        <div class="form-group">
            <textarea name="description" class="form-control" id="" cols="30" rows="5">{{$tag->description}}</textarea>
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary"  value="Update">
        </div>

    </form>


@endsection
