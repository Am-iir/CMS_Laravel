@extends('layouts.master')

@section('content')

        @if(count($categories)>0)
            @foreach($categories as $category)

                <h2 >
                    <a href="/category/{{$category->id}}">
                        {{$category->name}}
                    </a>
                </h2>
                <p >
                {{$category->description}}
            @endforeach
        @else
            <p> No categories found</p>
        @endif



@endsection
