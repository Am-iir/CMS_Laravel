@extends('layouts.admin')
@section('content')


            <h1> Create Post</h1>
            <form method="POST" action="{{route('admin.posts.store')}}">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control" id="article-ckeditor" cols="30" rows="4"
                              placeholder="Enter description about your post"></textarea>
                </div>

                <div class="form-group" id="addFeatureImage">
                    <button  class="btn btn-primary btn-sm" id="featureImage" > + Add Featured Image</button>
                    <input type="hidden" name="media_id" class="postMediaName" value="">
                </div>

                <div class="form-group">
                    <label class="control-label" for="tag_id">Choose your tags</label>

                    <select name="tag_id[]" id="tag_list" class="form-control" multiple="multiple">
                        @foreach($tags as $tag)
                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="newTag">
                    <button  class="btn btn-primary btn-sm" id="addBtn"> + Add New Tag</button>

                </div>
                <br>


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
                    <button type="submit" class="btn btn-primary">Publish</button>
                </div>
                @include('layouts.errors')

            </form>

    @include('admin.posts.addmedia')

@endsection

@section('yield')

    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('article-ckeditor');
    </script>

@endsection


