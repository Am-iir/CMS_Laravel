<h3> Upload the Image</h3>

<form method="POST" action="{{route('admin.media.store')}}" enctype="multipart/form-data">
    {{csrf_field()}}

    <div class="form-group">
        {{--                <label for="alt">Alt Text</label>--}}

        <input type="text" class="form-control{{ $errors->has('alt') ? ' is-invalid' : '' }}" id="title"  name="alt" placeholder="Enter Alternative text">
        @if ($errors->has('alt'))
            <span class="text-danger">{{ $errors->first('alt') }}</span>
        @endif
    </div>

    <div class="form-group">
        <input type="file" name="cover_image">
        @if ($errors->has('cover_image'))
            <br>
            <span class="text-danger">{{ $errors->first('cover_image') }}</span>
        @endif
    </div>


    <div class="form-group">
        <button type="submit" class="btn btn-primary">Publish</button>
    </div>


</form>
