<div class="site-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12">
                <h2>Recent Posts</h2>
            </div>
        </div>
        <div class="row">
            @foreach($recentPosts as $recentPost)
                <div class="col-lg-4 mb-4">
                    <div class="entry2">
                        @foreach($recentPost->media as $media)
                            <a href="{{route('front.show' , $recentPost->slug)}}">
                                <img src="{{asset('/storage/cover_images/large/'.$media->cover_image)}}"
                                     alt="{{ $media->alt }}" class="img-fluid rounded">
                            </a>

                        @endforeach

                        <div class="excerpt">
                            @foreach($recentPost->categories as $category)
                                <span class="post-category text-white bg-secondary mb-3">{{$category->name}}</span>
                            @endforeach

                            <h2><a href="{{route('front.show' , $recentPost->slug)}}">{{$recentPost->title}}</a></h2>
                            <div class="post-meta align-items-center text-left clearfix">
                                <figure class="author-figure mb-0 mr-3 float-left">
                                    <img src="{{asset('/storage/profile_images/'.$recentPost->user->profile_image)}}"
                                         alt="{{$recentPost->user->name}}"
                                         class="img-fluid">

                                </figure>
                                <span class="d-inline-block mt-1">By <a
                                            href="#">{{$recentPost->user->name}}</a></span>
                                <span>&nbsp;-&nbsp; {{$recentPost->created_at->toFormattedDateString()}}</span>
                            </div>
                            <p>{!!str_limit(strip_tags($recentPost->description))!!}.</p>
                            <p><a href="{{route('front.show' , $recentPost->slug)}}">Read More</a></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    {{$recentPosts->links()}}


    <!-- End pagination -->
    </div>
</div>
