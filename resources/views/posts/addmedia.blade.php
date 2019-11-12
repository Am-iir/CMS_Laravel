<div class="modal" id="mediaModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Media Library</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if(count($media)>0)
                    <div class="row" id="postMedia">

                    @foreach($media as $med)
                        <div  class="col-sm-2 offset-1" id="image_{{$med->id}}">
                            <input type="hidden" name="postMediaId" value="{{$med->id}}">
                            <img src="/storage/cover_images/{{$med->cover_image}}"  data-toggle="modal" data-target="#updateModal" alt="{{$med->alt}}" height="100" width="100">

                        </div>
                    @endforeach
                    </div>
                @else
                    <p> No Media found</p>
                @endif
            </div>
            {{$media->links()}}
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
