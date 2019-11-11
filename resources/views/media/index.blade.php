@extends('layouts.master')
@section('content')
    <div >
        <h1> Media Library</h1>
        <hr>
        <div  class="col-md-6 offset-3">

                <h3> Upload the Image</h3>

        <form method="POST" action="/media" enctype="multipart/form-data">
            {{csrf_field()}}

            <div class="form-group">
{{--                <label for="alt">Alt Text</label>--}}
                <input type="text" class="form-control" id="title"  name="alt" placeholder="Enter Alternative text">
            </div>

            <div class="form-group">
                <input type="file" name="cover_image">
            </div>


            <div class="form-group">
                <button type="submit" class="btn btn-primary">Publish</button>
            </div>
            @include('layouts.errors')

        </form>
        </div>
    </div>
    <hr>

    <div class="row" id="library" >

    @foreach($media as $med)
            <div  class="col-md-3 " id="image_{{$med->id}}">
                <input type="hidden" name="image_id" value="{{$med->id}}">
                <img src="/storage/cover_images/{{$med->cover_image}}"  data-toggle="modal" data-target="#updateModal" alt="{{$med->alt}}" height="200" width="200">

            </div>

    @endforeach
        @include('media.edit')

    </div>
    <hr>
    {{$media->links()}}

@endsection
