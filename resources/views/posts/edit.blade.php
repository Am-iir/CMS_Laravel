@extends('layouts.master')

@section('content')

    <h1> Edit Post</h1>
    <form action="/posts/{{$post->id}}" method="POST">
        {{method_field('PATCH')}}
        {{csrf_field()}}
        <div class="form-group">
            <input type="text" class="form-control" name="title" value="{{$post->title}}" placeholder="Project Title">

        </div>

        <div class="form-group">
            <textarea name="description" class="form-control" id="" cols="30" rows="4">{{$post->description}}</textarea>
        </div>

        <div class="form-group">
            <label class="control-label" for="tag_id">Choose your tags</label>

            <select name="tag_id[]" class="form-control" multiple="multiple">
                @foreach($tags as $tag)
                    <option value="{{$tag->id}}"
                    >{{$tag->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <p> Choose your category</p>

            @foreach($categories as $category)
                <ul>
                    <li>
                        <input type="checkbox" value="{{$category['id']}}" name="category_id[]">
                        <label for="category">{{$category['name']}}</label>

                        @for($i=0 ; $i<count($category['children_recursive']);$i++)

                            @if(!empty($category['children_recursive']))
                                <ul>
                                    <li>
                                        <input type="checkbox"
                                               value="{{$category['children_recursive'][$i]['id']}}"
                                               name="category_id[]">
                                        <label
                                            for="category">{{$category['children_recursive'][$i]['name']}}</label>
                                        @include('layouts.categorydisplay')
                                    </li>
                                </ul>

                            @endif
                        @endfor

                    </li>

                </ul>

            @endforeach
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Update">
        </div>

    </form>

@endsection
