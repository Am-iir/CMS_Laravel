@extends('layouts.admin')
@section('content')
    <div>
        <h1> Create Tag</h1>
        <form method="POST" action="{{route('admin.tags.store')}}">
            {{csrf_field()}}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control @errorClass('name')" id="title"  name="name"  value="{{ old('name') }}" placeholder="Enter Name">
                @errorBlock('name')
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control  " id="body" cols="30" rows="7" placeholder="Enter description about your tag"> {{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>

        </form>
    </div>
@endsection
