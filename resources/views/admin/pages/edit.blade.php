@extends('layouts.admin')

@section('content')

    <h1> Change {{$page->title}}</h1>
    <form method="POST" action="{{route('admin.pages.update' , $page->slug)}}">
        {{csrf_field()}}
        <div class="form-group">
            <label for="title">Title</label>

            <input type="text" class="form-control @errorClass('title')" id="title" name="title" value="{{$page->content['title']}}" placeholder="Enter Title">
            @errorBlock('title')
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control @errorClass('description')" id="article-ckeditor" cols="30" rows="4"
                      placeholder="Enter description about your post"> {{$page->content['description']}} </textarea>
            @errorBlock('description')
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Change</button>
        </div>

    </form>
@endsection

@section('script')

    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('article-ckeditor');
    </script>

@endsection




