@extends('layouts.master')
@section('content')
    <div >
        <h1> Media Library</h1>
        <hr>
        <div  class="col-md-6 offset-3">

            @include('media.create')

        </div>
    </div>
    <hr>

    <div class="row" id="library" >

        @if(count($media)>0)

    @foreach($media as $med)
            <div  class="col-md-3 " id="image_{{$med->id}}">
                <input type="hidden" name="image_id" value="{{$med->id}}">
                <img src="/storage/cover_images/{{$med->cover_image}}"  data-toggle="modal" data-target="#updateModal" alt="{{$med->alt}}" height="200" width="200">

            </div>
    @endforeach
        @else
            <p> No Media found</p>
        @endif
        @include('media.edit')

    </div>
    <hr>
    {{$media->links()}}

@endsection
