@extends('layouts.admin')

@section('content')

    <h1> Edit Post</h1>
    <form action="{{route('admin.posts.update' , $post->id)}}" method="POST">
        {{method_field('PATCH')}}
        {{csrf_field()}}
        <div class="form-group">
            <input type="text" class="form-control" name="title" value="{{$post->title}}" placeholder="Project Title">

        </div>

        <div class="form-group">
            <textarea name="description" class="form-control" id="article-ckeditor" cols="30" rows="4"> {!!  $post->description !!}</textarea>
        </div>

        <div class="form-group">
            <label class="control-label" for="tag_id">Choose your tags</label>

            <select name="tag_id[]" id="tag_list" class="form-control select2 " multiple="multiple">
                @forelse($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                @empty
                    <option value="" disabled>No tags available</option>
                @endforelse

            </select>


        </div>

        <div class="form-group">
            <label for="categories">Select Category</label>
            <select id="categories" name="category_id" multiple class="form-control select2 @errorClass('category_id')">
                @foreach($categories as $category)
                    @include('admin.posts._category', ['space' => 0])
                @endforeach
            </select>
            @errorBlock('category_id')

        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Update">
        </div>

    </form>

@endsection

@section('links')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet"/>
@endsection

@section('script')

    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('article-ckeditor');
    </script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>

    <script>
        let $select2 = $('.select2');

        $select2.select2({
            placeholder: 'Select',
            allowClear: true,
        });
    </script>

@endsection

