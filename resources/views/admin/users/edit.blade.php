@extends('layouts.admin')

@section('content')

    <h1> Edit User</h1>
    <form action="{{route('admin.users.update' , $user->id)}}" method="POST">
        {{method_field('PATCH')}}
        {{csrf_field()}}
        <div class="form-group">
            <input type="text" class="form-control" name="name" value="{{$user->name}}" readonly>
        </div>

        <div class="form-group">
            <input type="text" class="form-control" name="name" value="{{$user->email}}" readonly>
        </div>

        <div class="form-group">
            <label class="control-label" for="user_type">Choose user type</label>
            <select name="type" class="form-control" id="type_list">
                <option value="admin" >admin</option>
                <option value="author">author</option>
            </select>
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Update">
        </div>

    </form>

@endsection





