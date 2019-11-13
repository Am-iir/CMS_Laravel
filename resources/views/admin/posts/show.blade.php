@extends('layouts.admin')

@section('content')

<h1> {{ $post->title }}</h1>
<hr>
@if(count($post->tags))
    <ul>
        @foreach($post->tags as $tag)
            <li>
                <a href="/tags/{{$tag->name}}">
                    {{ $tag->name }}
                </a>
            </li>
        @endforeach
    </ul>
@endif
    {!!  $post->description !!}

<form action="{{route('admin.posts.edit', $post->id)}}">
    <input type="submit" value="Edit">
</form>

    <form action="{{route('admin.posts.destroy', $post->id)}}" method="POST">

        @method('DELETE')
        @csrf

        <div>
            <input type="submit" value="Delete">
        </div>
    </form>

@endsection
