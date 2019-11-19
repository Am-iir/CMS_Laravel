
@extends('layouts.admin')

@section('content')
    <h1> Edit Post</h1>
    <form action="{{route('admin.category.update' , $category->id)}}" method="POST">
        {{method_field('PATCH')}}
        {{csrf_field()}}
        <div class="form-group">
            <input type="text" class="form-control" name="name" value="{{$category->name}}" placeholder="Project Title">

        </div>

        <div class="form-group">
            <textarea name="description" class="form-control" id="" cols="30" rows="5">{{$category->description}}</textarea>
        </div>

        <div class="form-group">
            <label class="control-label" for="parent_id">Choose category</label>

            <select name="parent_id" class="form-control" >
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
            <input type="submit" class="btn btn-primary"  value="Update">
        </div>

    </form>


@endsection
