
<h3> Upload the Image</h3>

<form method="POST" action="{{route('admin.media.store')}}" enctype="multipart/form-data">
    {{csrf_field()}}

    <div class="form-group">
        {{--                <label for="alt">Alt Text</label>--}}
        <input type="text" class="form-control" id="title"  name="alt" placeholder="Enter Alternative text">
    </div>

    <div class="form-group">
        <input type="file" name="cover_image">
    </div>


    <div class="form-group">
        <button type="submit" class="btn btn-primary">Publish</button>
    </div>
    @include('layouts.errors')

</form>
