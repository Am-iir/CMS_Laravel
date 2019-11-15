@extends('layouts.admin')
@section('content')
    <div>
        <h1> Create Category</h1>
        <form method="POST" action="{{route('admin.category.store')}}">
            {{csrf_field()}}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="category_title"  name="name" placeholder="Enter Name">
            </div>

            <div class="form-group">
                <label for="name">Slug</label>
                <input type="text" class="form-control" id="category_slug"  name="slug" placeholder="Enter Slug">
            </div>

            <div class="form-group">
                <label for="categories">Select Category</label>
                <select id="categories" name="parent_id" multiple class="form-control select2">
                    @foreach($categories as $category)
                        @include('admin.posts._category', ['space' => 0])
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" id="body" cols="30" rows="4" placeholder="Enter description about category"></textarea>
            </div>


            <div class="form-group">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
            @include('layouts.errors')

        </form>
    </div>
@endsection

@section('links')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet"/>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>

    <script>
        let $select2 = $('.select2');

        $select2.select2({
            placeholder: 'Select',
            allowClear: true,
        });
    </script>
@endsection
