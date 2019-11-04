@extends('layouts.master')

@section('content')
<h1> {{ $post->title }}</h1>
<hr>
    {{$post->description}}

<form action="/posts/{{$post->id}}/edit">
    <input type="submit" value="Edit">
</form>

    <form action="/posts/{{$post->id}}" method="POST">

        @method('DELETE')
        @csrf

        <div>
            <input type="submit" value="Delete">
        </div>
    </form>
@endsection
