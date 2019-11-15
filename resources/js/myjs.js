$(document).ready(function () {

    let route;
    $("#library").on('click', 'img', function (e) {
        route = $(this).data('route');
        let $image = $(e.target);
        let image = $image.attr('src');
        let alt = $image.attr('alt');
        let image_id = $image.parent().find("input[name=image_id]").val();

        $('#updateModal').on('show.bs.modal', function () {
            $(".img-responsive").attr("src", image);
            $("input[name=image_alt]").val(alt);
            $("input[name=updateimage_id]").val(image_id);
        });
        e.preventDefault();
    });

    $(document).on('click', '#save_image', function (e) {

        let formData = new FormData();
        let imageData = $('input[name=newImage]')[0].files[0];
        formData.append('cover_image', imageData);
        formData.append('alt', $("input[name=image_alt]").val());
        formData.append('update_id', $("input[name=updateimage_id]").val());
        let updateId = $("input[name=updateimage_id]").val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: "/admin/media/" + updateId,
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function (msg) {
                // $('#updateModal').modal('toggle');
                $('#image_' + updateId).find('img').attr('src', "/storage/cover_images/" + msg.cover_image);
                $('#image_' + updateId).find('img').attr('alt', msg.alt);
            },
        });
        e.preventDefault();
    });


    $(document).on('click', '#delete', function (e) {


        let formData = {

            'delete_id': $("input[name=updateimage_id]").val(),
        };
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "DELETE",
            url: route,
            data: formData,
            success: function (msg) {

                $('#image_' + formData.delete_id).remove();
            },
        });
        e.preventDefault();
    });

    $('.newTag').on('click', '#addBtn', function (e) {
        e.preventDefault();
        let $a = $(e.target);
        let tag = $('<input type="text" name="newTag">');
        let btn = $('<button class="btn btn-primary" id="addTag"> Add </button>');
        $('.newTag').append(tag);
        $('.newTag').append(btn);
        $("#addBtn").attr("disabled", true);

    });

    $('.newTag').on('click', '#addTag', function (e) {
        let formData = {

            'name': $("input[name=newTag]").val(),
        };
        let last = parseInt($('#tag_list option:last-child').val()) + 1;


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: "/admin/tags",
            data: formData,
            success: function (msg) {

                $('#tag_list').append($('<option>', {
                    value: last,
                    text: formData.name
                }));
            },
        });
        e.preventDefault();
    });

    $('#featureImage').on('click', function (e) {
        e.preventDefault();
        $('#mediaModal').modal('toggle');
    });

    $('#postMedia').on('dblclick', 'img', function (e) {
        let $img = $(e.target);


        let mediaId = $img.parent().find("input[name=postMediaId]").val();
        let src = $img.attr('src');

        $('#mediaModal').modal('toggle');
        $('.postMediaName').val(mediaId);
        // $('#addFeatureImage').append('<label>' + alt + ' has been selected</label>');
        $("#addFeatureImage").append($('<img>',
            {
                src: src,
                width: 175,
                height: 150,
            }));

        $("#featureImage").attr("disabled", true);


    });

    $("#category_title").focusout(function(){
        let title =  $("#category_title").val();
        console.log(title);


        let formData = {
            'slug_name': title,
        };

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "GET",
            url: "/getSlug",
            data: formData,
            success: function (msg) {
                $("#category_slug").val(msg);

            },
        });


    });
});











