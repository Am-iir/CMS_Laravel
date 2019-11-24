<div class="site-section bg-light">
    <div class="container">
        <div class="row align-items-stretch retro-layout-2">

            @foreach($featuredPosts as $featurePost)


                @if ($loop->iteration == 3)
                    <div class="col-md-4">

                        @foreach($featurePost->media as $media)

                            <a href="#" class="h-entry img-5 h-100 gradient"
                               style="background-image: url('{{asset('/storage/cover_images/large/'.$media->cover_image)}}');">

                                <div class="text">
                                    <div class="post-categories mb-3">
                                        @foreach($featurePost->categories as $category)
                                            <span class="post-category bg-danger">{{$category->name}}</span>
                                        @endforeach
                                    </div>
                                    <h2>{{$featurePost->title}}</h2>
                                    <span class="date">{{$featurePost->created_at->toFormattedDateString()}}</span>
                                </div>
                            </a>
                        @endforeach
                    </div>

                @else
                    @if ($loop->iteration == 1 ||  $loop->iteration == 4)
                        <div class="col-md-4">
                            @foreach($featurePost->media as $media)
                                <a href="#" class="h-entry mb-30 v-height gradient"
                                   style="background-image: url('{{asset('/storage/cover_images/large/'.$media->cover_image)}}');">
                                    <div class="text">
                                        <h2>{{$featurePost->title}}</h2>
                                        <span class="date">{{$featurePost->created_at->toFormattedDateString()}}</span>
                                    </div>
                                </a>
                            @endforeach
                            @else
                                @foreach($featurePost->media as $media)

                                    <a href="#" class="h-entry v-height gradient"
                                       style="background-image: url('{{asset('/storage/cover_images/large/'.$media->cover_image)}}');">

                                        <div class="text">
                                            <h2>{{$featurePost->title}}</h2>
                                            <span
                                                class="date">{{$featurePost->created_at->toFormattedDateString()}}</span>
                                        </div>
                                    </a>
                                @endforeach
                        </div>
                    @endif
                @endif

            @endforeach


        </div>
    </div>
</div>
