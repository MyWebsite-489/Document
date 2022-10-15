(function ($) {
    "use strict";

    /* Loading Page Overlay */
    $.fn.loadingOverlayAdminActive = function () {
        $(".page-loading").appendTo("section.content").addClass("active");
    };

    $.fn.loadingOverlayAdminRemoveActive = function () {
        $(".page-loading").appendTo("section.content").removeClass("active");
    };

    /* Validator File Size */
    $.fn.FileSizeMax = function (validate) {
        $.validator.addMethod(
            "fileSizeMax",
            function (value, element, param) {
                var isOptional = this.optional(element),
                    file;

                if (isOptional) {
                    return isOptional;
                }

                if ($(element).attr("type") === "file") {
                    if (element.files && element.files.length) {
                        file = element.files[0];
                        return file.size && file.size / 1024 <= param;
                    }
                }
                return false;
            },
            validate
        );
    };

    /* Note popup */
    $.fn.noteSwalAdmin = function ($title, $message, $status) {
        swal({
            title: $title,
            text: $message,
            icon: $status,
            button: "Ok",
        });
    };
})(jQuery);

$(window).on("load", function () {
    $(".window-loading").fadeOut("slow");
});
