@extends('layouts.frontend')
@section('content')
    @forelse($post->media as $media)
        <header class="masthead"
                style="background-image: url( {{asset('/storage/cover_images/'.$media->cover_image)}}) ">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10 mx-auto">
                        <div class="post-heading">
                            <h1>{{$post->title}}</h1>
                            <span class="meta mb-3">Posted by
              {{$post->user->name}}
              on {{$post->created_at->toFormattedDateString()}}</span>
                            <span>
                        <small>
                    <i class="fas fa-tags"></i>
                    @forelse($post->tags as $tag)
                                {{ $tag->name }}
                            @empty
                                No Tags

                            @endforelse
                </small>
                    </span>
                            <span class="ml-5">

                    <small>

                        <i class="fas fa-wrench"></i>

                        @forelse($post->categories as $category)
                            {{ $category->name }}
                        @empty
                            No Categories

                        @endforelse
                    </small>

                    </span>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <article>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10 mx-auto">
                        {!!  $post->description !!}

                    </div>
                </div>
            </div>
        </article>

    @empty
        ---
    @endforelse

@endsection
