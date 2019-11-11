@extends('layouts.master')
@section('content')
    <div >
        <h1> Create Category</h1>
        <form method="POST" action="/media" enctype="multipart/form-data">
            {{csrf_field()}}

            <div class="form-group">
                <label for="alt">Alt Text</label>
                <input type="text" class="form-control" id="title"  name="alt" placeholder="Enter Alternative text">
            </div>

            <div class="form-group">
                <input type="file" name="cover_image">
            </div>


            <div class="form-group">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
            @include('layouts.errors')

        </form>
    </div>
@endsection

