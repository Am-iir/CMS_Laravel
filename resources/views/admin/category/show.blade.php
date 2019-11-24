@extends('layouts.admin')

@section('content')
    <div class="container">

        @foreach($posts as $post)

            <h2 >
                <a href="">
                    {{$post->title}}
                </a>
            </h2>
            <p >
                {{$post->created_at->toFormattedDateString()}}</p>
            {!! $post->description !!}
        @endforeach

    </div>

@endsection
