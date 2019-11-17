<h3> Upload the Image</h3>

<form method="POST" action="{{route('admin.media.store')}}" enctype="multipart/form-data">
    {{csrf_field()}}

    <div class="form-group">
        {{--                <label for="alt">Alt Text</label>--}}

        <input type="text" class="form-control @errorClass('alt')" id="title"  name="alt" value="{{ old('alt') }}" placeholder="Enter Alternative text">
        @errorBlock('alt')
    </div>

    <div class="form-group">
        <input type="file" class="form-control @errorClass('cover_image')" name="cover_image" value="{{ old('cover_image') }}">
        @errorBlock('cover_image')
    </div>


    <div class="form-group">
        <button type="submit" class="btn btn-primary">Publish</button>
    </div>


</form>
