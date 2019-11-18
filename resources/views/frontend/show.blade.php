@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">


        <div class="col-sm-3 ">
    <h1> {{ $post->title }}</h1>
        </div>

            <div class="col-sm-3 offset-5">
                <a href="/" class="btn btn-primary">Go Back</a>
            </div>

        </div>
    <hr>


    @forelse($post->media as $media)
        <img srcset="{{asset('/storage/cover_images/thumbnail/'.$media->cover_image)}} 100w,
             {{asset('/storage/cover_images/medium/'.$media->cover_image)}} 480w,
             {{asset('/storage/cover_images/large/'.$media->cover_image)}} 720w"

             sizes="
             (max-width: 190px) 100px,
             (max-width: 470px) 200px,
                     (max-width: 700px) 480w,
                                    720px
                         "
         src="{{asset('/storage/cover_images/'.$media->cover_image)}}" alt="{{ $media->alt }}">
    @empty
        <small> No Image </small>
        @endforelse

        <div class="row">
            <div class="col-sm-3 ">
                <small>
                    <i class="fas fa-tags"></i>
                    @forelse($post->tags as $tag)
                        {{ $tag->name }}
                    @empty
                        No Tags

                    @endforelse
                </small>
            </div>
            <div class="col-sm-3 ">
                <small>

                    <i class="fas fa-wrench"></i>

                    @forelse($post->categories as $category)
                        {{ $category->name }}
                    @empty
                        No Categories

                    @endforelse
                </small>
            </div>
    {!!  $post->description !!}
    </div>


@endsection
