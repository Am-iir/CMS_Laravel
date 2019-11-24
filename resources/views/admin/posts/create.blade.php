@extends('layouts.admin')
@section('content')

    <h1> Create Post</h1>
    <form method="POST" action="{{route('admin.posts.store')}}">
        {{csrf_field()}}
        <div class="form-group">
            <label for="title">Title</label>

            <input type="text" class="form-control @errorClass('title')" id="title" name="title"
                   value="{{ old('title') }}" placeholder="Enter Title">
            @errorBlock('title')
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control @errorClass('description')" id="article-ckeditor" cols="30"
                      rows="4"
                      placeholder="Enter description about your post"> {{ old('description') }} </textarea>
            @errorBlock('description')
        </div>


        <div class="form-group" id="addFeatureImage">
            <button class="btn btn-primary btn-sm  " id="featureImage"> + Add Featured Image</button>
            <input type="hidden" name="media_id" class="form-control @errorClass('media_id') postMediaName" value="">
            @errorBlock('media_id')

        </div>

        <div class="form-group">
            <label class="control-label" for="tag_id">Choose your tags</label>

            <select name="tag_id[]" id="tag_list" class="form-control select2 @errorClass('tag_id')"
                    multiple="multiple">
                @forelse($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                @empty
                    <option value="" disabled>No tags available</option>
                @endforelse

            </select>
            @errorBlock('tag_id')
        </div>


        <div class="newTag">
            <button class="btn btn-primary btn-sm" id="addBtn"> + Add New Tag</button>

        </div>
        <br>

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
            <button type="submit" class="btn btn-primary">Publish</button>
        </div>

    </form>

    @include('admin.posts.addmedia')

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




