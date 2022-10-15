$(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("#create-slider").submit(function (e) {
        e.preventDefault();
        let form = $(this).serializeArray();
        $("#name-msg-err").html("");
        $("#description-msg-err").html("");
        $("#status-msg-err").html("");
        $("#thumbnail-msg-err").html("");
        $("#alert-msg-err").html("");
        const formData = new FormData();

        form.forEach((item) => {
            if (item.name === "thumbnail") {
                formData.append(
                    item.name,
                    $("input[type=file]")[0].files[0] || ""
                );
            } else {
                formData.append(item.name, item.value || "");
            }
        });

        $.ajax({
            method: "POST",
            url: "/admin/sliders/create",
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            success: (data) => {
                if (data.success) {
                    location.reload();
                }
            },
            error: (response) => {
                if (response.status === 422) {
                    const errors = response.responseJSON?.errors;
                    if (errors?.name) {
                        $("#name-msg-err").html(errors.name[0]);
                    }
                    if (errors?.description) {
                        $("#description-msg-err").html(errors.description[0]);
                    }
                    if (errors?.status) {
                        $("#status-msg-err").html(errors.status[0]);
                    }
                    if (errors?.thumbnail) {
                        $("#thumbnail-msg-err").html(errors.thumbnail[0]);
                    }
                } else if (response.status >= 400) {
                    let textMessage = "Có lỗi xảy ra";
                    const errors = response.responseJSON?.errors;
                    $("#alert-msg-err").html(
                        errors ? textMessage + " " + errors : textMessage
                    );
                    $("#toast-msg").addClass("alert-danger");
                    $("#toast-msg").toast("show");
                }
            },
        });
    });

    $("#update-slider").submit(function (e) {
        e.preventDefault();
        let form = $(this).serializeArray();
        let sliderId = $("#id-slider").val();
        $("#name-update-msg-err").html("");
        $("#description-update-msg-err").html("");
        $("#status-update-msg-err").html("");
        $("#thumbnail-update-msg-err").html("");
        $("#alert-msg-err").html("");
        const formData = new FormData();

        form.forEach((item) => {
            if (item.value) {
                if (item.name === "thumbnail") {
                    formData.append(
                        item.name,
                        $("input[type=file]")[0].files[0] || ""
                    );
                } else {
                    formData.append(item.name, item.value || "");
                }
            }
        });
        formData.append("id", sliderId);

        $.ajax({
            method: "POST",
            url: "/admin/sliders/update",
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            success: (data) => {
                if (data.success) {
                    location.reload();
                }
            },
            error: (response) => {
                if (response.status === 422) {
                    const errors = response.responseJSON?.errors;
                    if (errors?.name) {
                        $("#name-update-msg-err").html(errors.name[0]);
                    }
                    if (errors?.description) {
                        $("#description-update-msg-err").html(
                            errors.description[0]
                        );
                    }
                    if (errors?.status) {
                        $("#status-update-msg-err").html(errors.status[0]);
                    }
                    if (errors?.thumbnail) {
                        $("#thumbnail-update-msg-err").html(
                            errors.thumbnail[0]
                        );
                    }
                } else if (response.status >= 400) {
                    let textMessage = "Có lỗi xảy ra";
                    const errors = response.responseJSON?.errors;
                    $("#alert-msg-err").html(
                        errors ? textMessage + " " + errors : textMessage
                    );
                    $("#toast-msg").addClass("alert-danger");
                    $("#toast-msg").toast("show");
                }
            },
        });
    });
});

$(document).ready(function () {
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

function getSliderDetail(id) {
    $(".preview_image").attr("src", "/assets/images/placeholder.png");
    $.ajax({
        method: "GET",
        url: `/admin/sliders/detail/${id}`,
        processData: false,
        contentType: false,
        cache: false,
        success: (data) => {
            if (data.success) {
                const sliderData = data.slider;
                $("#id-slider").val(sliderData.id);
                $("#name-slider").val(sliderData.name);
                $("#description-slider").val(sliderData.description);
                $("#href-slider").val(sliderData.href);
                $("#status-slider").val(sliderData.status);
                $("#thumbnail-slider").attr(
                    "src",
                    sliderData.thumbnail
                        ? document.location.origin + "/" + sliderData.thumbnail
                        : "/assets/images/placeholder.png"
                );
            }
        },
        error: (response) => {
            if (response.status >= 400) {
                let textMessage = "Có lỗi xảy ra";
                const errors = response.responseJSON?.errors;
                $("#alert-msg-err").html(
                    errors ? textMessage + " " + errors : textMessage
                );
                $("#toast-msg").addClass("alert-danger");
                $("#toast-msg").toast("show");
            }
        },
    });
}

function openDeleteModal(id, name) {
    $("#modal-delete-name").html(name);
    $("#button-submit-delete").attr("onclick", `confirmDelete(${id})`);
}

function confirmDelete(id) {
    $.ajax({
        url: `/admin/sliders/delete/${id}`,
        method: "DELETE",
        processData: false,
        contentType: false,
        cache: false,
        success: (data) => {
            if (data.success) {
                location.reload();
            }
        },
        error: (response) => {
            if (response.status >= 400) {
                let textMessage = "Có lỗi xảy ra";
                const errors = response.responseJSON?.errors;
                $("#alert-msg-err").html(
                    errors ? textMessage + " " + errors : textMessage
                );
                $("#toast-msg").addClass("alert-danger");
                $("#toast-msg").toast("show");
            }
        },
    });
}
