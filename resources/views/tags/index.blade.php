@extends('layouts.master')

@section('content')


    <table class="table table-striped">

        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Actions</th>

        </tr>
        </thead>
        <tbody>
        @if(count($tags)>0)

            @foreach($tags as $indexKey => $tag)

                <tr>
                    <td>{{$indexKey+1}}</td>
                    <td> <h5> <a href="/tags/{{$tag->name}}">
                            {{$tag->name}}
                        </a>
                        </h5></td>
                    <td>
                        <button class="btn btn-primary">  Edit</button>
                        <button class="btn btn-danger"> Delete</button>
                    </td>

                </tr>
            @endforeach

        </tbody>
    </table>

        @else
            <p> No tags found</p>
        @endif



@endsection
