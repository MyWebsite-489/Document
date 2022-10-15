$(document).ready(function () {
    //event scoll header
    $(window).scroll(function () {
        var distant = $(".site-header").innerHeight();

        if ($(window).scrollTop() <= distant) {
            $(".site-header").removeClass("fixed");
        } else {
            $(".site-header").addClass("fixed");
        }

        if ($(window).scrollTop() == 0) {
            $(".site-header").removeClass("fixed");
        }
        else if($(window).scrollTop() > distant){
            $(".site-header").addClass("fixed");
        }
    });

    $(document).on('click', '.menu-mb .menu-mb-lv1.has-child > a', function (e){
        var $this = $(this).parent();
        if($this.hasClass('show')){
            $this.removeClass('show');
            $this.find('.menu-mb-lv2').slideUp(300,'linear');
        }
        else{
            $this.addClass('show');
            $this.find('.menu-mb-lv2').slideDown(300,'linear');
        }
    });
    $(document).on('click', '.menu-mb .menu-mb-lv1 .scroll-box-contact', function (e){
        $('.close-mb-menu').click();
    });
    $('.menu-mb .icon-bar').on('click', function(e){
        $('.mean-menu-mb').addClass('show');
        $('body').addClass('overflow-hidden');
    });

    $(document).on('click','.close-mb-menu', function(){
        $('.mean-menu-mb').removeClass('show');
        $('body').removeClass('overflow-hidden');
    });

    $(document).on('click','.contact-box', function(){
        $('html, body').animate({
            scrollTop: $("#box-contact").offset().top
        }, 1000);
    });
});
