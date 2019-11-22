@extends('layouts.frontend')

@section('content')

    <!-- Page Header -->
    <header class="masthead" style="background-image: url({{asset('img/home-bg.jpg')}})">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>CMS Blog</h1>
                        <span class="subheading">A Blog by Amir</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">


                @forelse($posts as $post)

                    <div class="post-preview">
                        <a href="{{route('front.show' , $post->slug)}}">
                            <h2 class="post-title">
                                {{$post->title}}
                            </h2>
                        </a>
                        <p class="post-meta">Posted by
                            {{$post->user->name}}
                            on {{$post->created_at->toFormattedDateString()}}</p>
                        <div class="row">


                            <div class="col-sm-2 mt-3">
                                @forelse($post->media as $media)
                                    <img src="{{asset('/storage/cover_images/thumbnail/'.$media->cover_image)}}"
                                         alt="{{ $media->alt }}">

                                @empty
                                    <small> No Image </small>
                                @endforelse
                            </div>
                            <div class="col-sm-10 ">
                                {!! \Illuminate\Support\Str::words(strip_tags($post->description), 25,'  ......')  !!}

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3  ">
                                <small>
                                    <i class="fas fa-tags"></i>
                                    @forelse($post->tags as $tag)
                                        {{ $tag->name }}
                                    @empty
                                        No Tags

                                    @endforelse
                                </small>
                            </div>
                            <div class="col-sm-5 ">
                                <small>

                                    <i class="fas fa-wrench"></i>

                                    @forelse($post->categories as $category)
                                        {{ $category->name }}
                                    @empty
                                        No Categories

                                    @endforelse
                                </small>
                            </div>
                        </div>


                    </div>
                    <hr>
                @empty
                    <div class="post-preview">
                        No Posts Available

                    </div>
                @endforelse

            </div>

            <div class="col-lg-8 col-md-10 offset-5">
                {{$posts->links()}}
            </div>

        </div>
    </div>
@endsection
