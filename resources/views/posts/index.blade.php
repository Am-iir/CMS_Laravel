@extends('layouts.app')

@section('content')
    <div class="container">
        @if(count($posts)>0)
            @foreach($posts as $post)

                <h2 class="blog-post-title">
                    <a href="/posts/{{$post->id}}">
                        {{$post->title}}
                    </a>
                </h2>
                <p class="blog-post-meta">

                    {{$post->created_at->toFormattedDateString()}}</p>
                {{$post->description}}
            @endforeach
            {{$posts->links()}}
        @else
            <p> No posts found</p>
        @endif

    </div>

@endsection
