$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

function openDeleteModal(id, name) {
    $("#modal-delete-name").html(name);
    $("#button-submit-delete").attr("onclick", `confirmDelete(${id})`);
}

function confirmDelete(id) {
    $.ajax({
        url: `/admin/post/delete/${id}`,
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
