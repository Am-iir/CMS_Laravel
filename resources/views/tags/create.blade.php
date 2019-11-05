@extends('layouts.master')
@section('content')
    <div>
        <h1> Create Tag</h1>
        <form method="POST" action="/tags">
            {{csrf_field()}}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="title"  name="name" placeholder="Enter Name">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" id="body" cols="30" rows="7" placeholder="Enter description about your tag"></textarea>
            </div>



            <div class="form-group">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
            @include('layouts.errors')

        </form>
    </div>
@endsection
