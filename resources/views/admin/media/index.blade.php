@extends('layouts.admin')
@section('content')
    <div>
        <h1> Media Library</h1>
        <hr>
        <div class="col-md-6 offset-3">

            @include('admin.media.create')

        </div>
    </div>

    <hr>

    <div class="row" id="library">

        @if(count($media)>0)

            @foreach($media as $med)
                <div class="col-md-3 " id="image_{{$med->id}}">
                    <input type="hidden" name="image_id" value="{{$med->id}}">
                    <img srcset="{{asset('/storage/cover_images/thumbnail/'.$med->cover_image)}} 100w,
             {{asset('/storage/cover_images/medium/'.$med->cover_image)}} 480w,
             {{asset('/storage/cover_images/large/'.$med->cover_image)}} 720w"

                         sizes="(max-width: 150px) 100px,
                                    (max-width: 480px) 200px,
                                    200px
                         "


                        src="{{asset('/storage/cover_images/'.$med->cover_image)}}"
                         data-id="{{$med->id}}"
                         data-route="{{route('admin.media.destroy', $med->id)}}"
                         data-toggle="modal"
                         data-target="#updateModal"
                         alt="{{$med->alt}}"
                         height="200" width="200" >
                </div>
            @endforeach
        @else
            <p> No Media found</p>
        @endif
        @include('admin.media.edit')

    </div>
    <hr>
    {{$media->links()}}

@endsection
