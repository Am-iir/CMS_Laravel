@extends('layouts.admin')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Posts</h1>

        <a href="{{route('admin.posts.create')}}"
           class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50 mr-2"></i> Add New
        </a>
    </div>

    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-12 mb-4">
            <!-- Project Card Example -->
            <div class="card shadow">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>SN</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Categories</th>
                                <th>Tags</th>
                                <th class="text-center"><i class="fa fa-comment-alt"></i></th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($posts as $index => $post)
                                <tr>
                                    <td>{{$index + $posts->firstItem()}}</td>
                                    <td>{{$post->title}}</td>
                                    <td>Admin</td> {{--TODO add users functionality--}}

                                    <td>
                                        @forelse($post->categories as $category)
                                            {{$category->name}} @if(!$loop->last),&nbsp;@endif
                                        @empty
                                            ---
                                        @endforelse
                                    </td>

                                    <td>
                                        @forelse($post->tags as $tag)
                                            {{$tag->name}} @if(!$loop->last),&nbsp; @endif
                                        @empty
                                            ---
                                        @endforelse
                                    </td>

                                    <td class="text-center">
                                        <span class="fa-stack">
                                            <i class="fa fa-comment-alt fa-stack-2x"></i>
                                            <strong class="fa-stack-1x text-white">0</strong>
                                        </span>
                                    </td>

                                    <td>
                                        {{$post->created_at->diffForHumans()}}
                                    </td>

                                    <td class="text-center">
                                        <a href="{{route('admin.posts.show', $post->id)}}" class="btn btn-warning"
                                           title="View Post">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{route('admin.posts.edit', $post->id)}}" class="btn btn-primary"
                                           title="Edit Post">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{route('admin.posts.destroy', $post->id)}}" class="btn btn-danger"
                                           title="Delete Post">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center text-uppercase font-weight-bold">
                                        No Posts available
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{$posts->links()}}
                </div>
            </div>
        </div>
    </div>

{{--    <div class="container">--}}
{{--        @if(count($posts)>0)--}}
{{--            @foreach($posts as $post)--}}

{{--                <div class="card">--}}
{{--                    <div class="card-header">--}}
{{--                        <h3 class="blog-post-title">--}}
{{--                            <a href="{{route('admin.posts.show' , $post->id)}}">--}}
{{--                                {{$post->title}}--}}
{{--                            </a>--}}
{{--                        </h3>--}}

{{--                    </div>--}}

{{--                    <div class="card-body">--}}
{{--                        <p class="blog-post-meta">--}}

{{--                            {{$post->created_at->toFormattedDateString()}}</p>--}}
{{--                        {!!$post->description  !!}--}}

{{--                    </div>--}}

{{--                </div>--}}

{{--                <br>--}}


{{--            @endforeach--}}
{{--            {{$posts->links()}}--}}
{{--        @else--}}
{{--            <p> No posts found</p>--}}
{{--        @endif--}}

{{--    </div>--}}

@endsection



