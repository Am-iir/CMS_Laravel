@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Edit Profile</h1>
        <hr>
        <form class="form-horizontal"  action="{{route('admin.profile.update' , $user->id)}}" method="POST" enctype="multipart/form-data">

        <div class="row">

            <!-- left column -->
            <div class="col-md-3">
                <div class="text-center">
                    @if(empty($user->profile_image))
                        <img src="{{asset('img/no-image.png')}}" class="avatar img-circle" id="profileImage" alt="avatar" height="200" width="200">

                    @else

                    <img src="{{asset('/storage/profile_images/'.$user->profile_image)}}" class="avatar img-circle"   id="profileImage" alt="avatar" height="200" width="200">
                    @endif
                        <hr>
                        <h6>Upload a different photo...</h6>
                    <input type="file" class="form-control" name="profile_image" id="profile-img">
                </div>
            </div>

            <!-- edit form column -->
            <div class="col-md-9 personal-info">

                @include('layouts.flash_message')

                <h3>Personal info</h3>

                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Name:</label>
                        <div class="col-lg-8">
                            <input class="form-control @errorClass('name')" type="text" name="name" value="{{ $user->name }}">
                            @errorBlock('name')
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Email:</label>
                        <div class="col-lg-8">
                            <input class="form-control @errorClass('email')" type="text" name="email" value="{{ $user->email }}">
                            @errorBlock('email')

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Password:</label>
                        <div class="col-md-8">
                            <input class="form-control @errorClass('password')" type="password"  name="password"  value="">
                            @errorBlock('password')
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Confirm password:</label>
                        <div class="col-md-8">
                            <input class="form-control @errorClass('password_confirmation')" type="password" name="password_confirmation" value="">
                            @errorBlock('password_confirmation')
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-8">
                            <input type="submit" class="btn btn-primary" value="Save Changes">
                            <span></span>
                            <input type="reset" class="btn btn-default" value="Cancel">
                        </div>
                    </div>

            </div>

        </div>
        </form>
    </div>
    <hr>
@endsection
