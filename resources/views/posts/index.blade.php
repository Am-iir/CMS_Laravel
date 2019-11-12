@extends('layouts.app')

@section('content')
    <div class="container">
        @if(count($posts)>0)
            @foreach($posts as $post)

                <div class="card">
                    <div class="card-header">
                        <h3 class="blog-post-title">
                            <a href="/posts/{{$post->id}}">
                                {{$post->title}}
                            </a>
                        </h3>

                    </div>

                    <div class="card-body">
                        <p class="blog-post-meta">

                            {{$post->created_at->toFormattedDateString()}}</p>
                        {!!$post->description  !!}

                    </div>

                </div>

                <br>


            @endforeach
            {{$posts->links()}}
        @else
            <p> No posts found</p>
        @endif

    </div>

@endsection



