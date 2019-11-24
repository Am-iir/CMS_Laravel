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

        @if($page->slug == 'about')

        <div class="form-group">
            <label for="sectionTwo">Section Two</label>
            <textarea name="sectionTwo" class="form-control @errorClass('sectionTwo')" id="article-ckeditorTwo" cols="30" rows="4"
                      placeholder="Enter description for section two"> {{$page->content['sectionTwo']}} </textarea>
            @errorBlock('sectionTwo')
        </div>

        <div class="form-group">
            <label for="sectionThree">Section Three</label>
            <textarea name="sectionThree" class="form-control @errorClass('sectionThree')" id="article-ckeditorThree" cols="30" rows="4"
                      placeholder="Enter description for section three"> {{$page->content['sectionThree']}} </textarea>
            @errorBlock('sectionThree')
        </div>

        @endif

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Change</button>
        </div>

    </form>
@endsection

@section('script')

    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('article-ckeditor');
        CKEDITOR.replace('article-ckeditorTwo');
        CKEDITOR.replace('article-ckeditorThree');
    </script>

@endsection




