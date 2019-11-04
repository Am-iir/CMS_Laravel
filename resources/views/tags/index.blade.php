@extends('layouts.app')

@section('content')
    <div class="container">
        @if(count($tags)>0)
            @foreach($tags as $tag)

                <h2 >
                    <a href="/tags/{{$tag->id}}">
                        {{$tag->name}}
                    </a>
                </h2>
                <p >
                    {{$tag->created_at->toFormattedDateString()}}</p>
                {{$tag->description}}
            @endforeach
        @else
            <p> No tags found</p>
        @endif

    </div>

@endsection
