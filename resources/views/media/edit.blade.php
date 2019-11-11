<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalTitle">Update Image </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modalBody">

                <div class="row">
                    <div class="col-md-5 ">
                        <img src="" class="img-responsive"
                             alt="" height="200" width="200">
                        <hr>

                        <input type="file" name="newImage">


                    </div>
                    <div class="mt-5  ml-3 col-md-3">
                        <label for="image_alt">Alt</label>
                        <input type="text" name="image_alt" value="">
                        <input type="hidden" name="updateimage_id" value="">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" id="delete" data-dismiss="modal">Delete</button>
                <button type="button" class="btn btn-primary" id="save_image" data-dismiss="modal">Save</button>
            </div>
        </div>
    </div>
</div>

