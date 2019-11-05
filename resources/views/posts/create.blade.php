@extends('layouts.master')
@section('content')

    <div class="container">
        @include('layouts.sidebar')
        <div class="row">
            <div class="col-md-6 offset-1">
                <h1> Create Post</h1>
                <form method="POST" action="/posts">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title"  name="title" placeholder="Enter Title">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" id="body" cols="30" rows="7" placeholder="Enter description about your post"></textarea>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="tag_id">Choose your tags</label>

                        <select name="tag_id[]" class="form-control" multiple="multiple">
                            @foreach($tags as $tag)
                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    {{--            @foreach($tags as $tag)--}}
                    {{--                <div class="form-group">--}}
                    {{--                    <label for="tag">{{$tag->name}}</label>--}}
                    {{--                    <input type="checkbox" value="{{$tag->id}}" name="tag[]">--}}
                    {{--                </div>--}}
                    {{--            @endforeach--}}


                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Publish</button>
                    </div>
                    @include('layouts.errors')



                </form>

            </div>
        </div>
    </div>
@endsection
