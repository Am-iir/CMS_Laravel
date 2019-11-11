@extends('layouts.master')

@section('content')

        @if(count($tags)>0)
            @foreach($tags as $tag)

                <h2 >
                    <a href="/tags/{{$tag->name}}">
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



@endsection
