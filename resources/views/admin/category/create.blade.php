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
                <label class="control-label" for="parent_id">Choose category</label>

                <select name="parent_id" class="form-control" >
                    <option  value="">None</option>
                    @foreach($categories as $category)

                        @if($category->parent_id !== Null )

                            <option class="child" value="{{$category->id}}">{{$category->name}}</option>

                        @else
                            <option value="{{$category->id}}">{{$category->name}}</option>

                        @endif
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
