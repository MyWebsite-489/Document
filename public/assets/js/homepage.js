$(document).ready(function () {
    var sync1 = $(".environment-slide-content");
    var sync2 = $(".environment-slide-dot");

    sync1
        .owlCarousel({
            slideSpeed: 5000,
            smartSpeed: 1000,
            nav: true,
            autoplay: true,
            dots: false,
            loop: false,
            margin: 20,
            navText: false,
            items: 1,
        })
        .on("changed.owl.carousel", syncPosition);

    sync2
        .on("initialized.owl.carousel", function () {
            sync2.find(".slide-dot").eq(0).addClass("current");
        })
        .owlCarousel({
            items: 7,
            dots: false,
            nav: false,
            loop: false,
            smartSpeed: 1000,
            slideSpeed: 5000,
            slideBy: 1,
        })
        .on("changed.owl.carousel", syncPosition2);

    function syncPosition(el) {
        var number = el.item.index;
        sync2.find(".slide-dot").removeClass("current");
        sync2.find(".slide-dot").eq(number).addClass("current");
        sync2.data("owl.carousel").to(number, 100, true);
    }

    function syncPosition2(el) {
        var number = el.item.index;
        sync2.find(".slide-dot").removeClass("current");
        sync2.find(".slide-dot").eq(number).addClass("current");
        sync1.data("owl.carousel").to(number, 100, true);
    }

    sync2.on("click", ".owl-item", function (e) {
        e.preventDefault();
        var number = $(this).index();
        sync2.find(".slide-dot").removeClass("current");
        sync2.find(".slide-dot").eq(number).addClass("current");
        sync1.data("owl.carousel").to(number, 300, true);
    });
});

$(document).ready(function () {
    $("#owl").owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        navText: ["prev", "next"],
        items: 1,
    });
});
