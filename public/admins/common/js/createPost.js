$(document).ready(function () {
    $("#createPost").validate({
        rules: {
            name: {
                required: true,
                length: 255,
            },
            description: {
                required: true,
                length: 255,
            },
            content: {
                required: true,
            },
            status: {
                required: true,
                type: "integer",
            },
            thumbnail: {
                required: true,
                accept: "jpg|jpeg|png|JPG|JPEG|PNG",
            },
        },
    });

    $(".preview-image-wrapper").click(function (e) {
        $(".preview_image").attr("src", "/assets/images/placeholder.png");
        $(".btn_gallery").attr("value", "");
        $(".btn_gallery").trigger("click");
    });

    $(".btn_gallery").change(function (e) {
        if (e.target.files[0]) {
            $(".preview_image").attr(
                "src",
                URL.createObjectURL(e.target.files[0])
            );
        }
    });
});
