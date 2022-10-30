$(document).ready(function () {
    /*start the loading page */
    jQuery(".loader").fadeOut("slow");
    //scroll to top make fade for button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 700) {
            $(".scroll-top-button").fadeIn();
        } else {
            $(".scroll-top-button").fadeOut();
        }
    });
    //scroll to top button
    $(".scroll-top-button").on('click', function () {
        $('html , body').animate({
            scrollTop: 0
        }, 100);
    });
    //start active navbar
   $('.hamburger').click(function(){
        $('.hamburger').toggleClass('active');
        $('.bottom-nav').toggleClass('acitve-nav');
        $('body').toggleClass('overflowNone')
    });
    //owl header screen 
    $('.owl-header').owlCarousel({
        rtl: true,
        loop:true,
        margin: 20,
        nav:false,
        dots: true,
        autoplay: true,
        touchDrag  :false,
		mouseDrag  : false,
		autoWidth: false,
		animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        autoplayTimeout: 2000,
		smartSpeed: 2000,
		dragEndSpeed: 2000,
		slidSpeed: 900,
        paginationSpeed: 900,
        autoplayHoverPause: true,
        items:1
    });
    //partner slider 
    $('.owl-partner').owlCarousel({
        rtl: true,
        loop:false,
        margin: 20,
        nav:false,
        dots: true,
        autoplay: true,
        touchDrag  : true,
		mouseDrag  : true,
		autoWidth: false,
		animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        autoplayTimeout: 6000,
		smartSpeed: 2000,
		dragEndSpeed: 2000,
		slidSpeed: 900,
        paginationSpeed: 900,
        autoplayHoverPause: true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:4
            }
        }
    });
    $('.owl-single-product').owlCarousel({
        rtl: true,
        loop:true,
        margin: 0,
        nav:true,
        dots: false,
		smartSpeed: 2000,
		dragEndSpeed: 2000,
		slidSpeed: 900,
        paginationSpeed: 900,
        autoplayHoverPause: true,
        items:1
    });
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });
   
    var $r = $('input[type="range"]');
    var $ruler = $('<div class="rangeslider__ruler" />');

    // Initialize
    $r.rangeslider({
        polyfill: false,
        rtl: true,
    onInit: function() {
        $ruler[0].innerHTML = getRulerRange(this.min, this.max, this.step);
        this.$range.prepend($ruler);}
    });

    function getRulerRange(min, max, step) {
    var range = '';
    var i = 0;
    
    while (i <= max) {
        range += i + ' ';
        i = i + step;
    }
    return range;
    }

});