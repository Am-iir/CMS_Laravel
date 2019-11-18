@extends('layouts.app')

@section('content')
    <body>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/home-bg.jpg')">
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
                <div class="card">
                    <div class="card-header">
                        <h3 class="post-title">
                            <a href="{{route('front.show' , $post->id)}}">
                                {{$post->title}}
                            </a>
                        </h3>
                        <small>Posted by
                            {{$post->user->name}}
                            on {{$post->created_at->toFormattedDateString()}}</small>
                    </div>

                    <div class="card-body pt-0" >
                        <div class="row">
                            <div class="col-sm-2 mt-5">
                                @forelse($post->media as $media)
                                    <img src="{{asset('/storage/cover_images/thumbnail/'.$media->cover_image)}}" alt="{{ $media->alt }}">

                                @empty
                                    <small> No Image </small>
                                @endforelse
                            </div>
                            <div class="col-sm-10 ">
                                {!! \Illuminate\Support\Str::words($post->description, 25,'  ......')  !!}

                            </div>
                        </div>
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

                            <div class="col-sm-2 offset-3">
                                <a href="{{route('front.show' , $post->id)}}" class="btn-sm  btn-secondary p-2">View Post.. </a>

                            </div>

                    </div>
                </div>
                </div>
                    <br>

                @empty

            <div class="card">
                <div class="card-header">
                    <h3 class="post-title">
                       No Posts Available
                    </h3>
                </div>
            </div>
                @endforelse

            </div>

            <div class="col-lg-8 col-md-10 offset-5">
                {{$posts->links()}}
            </div>

        </div>




        </div>


    </body>


@endsection
