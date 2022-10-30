document.addEventListener('DOMContentLoaded', () => {

    // Unix timestamp (in seconds) to count down to
    var twoDaysFromNow = (new Date().getTime() / 1000) + (86400 * 2) + 1;

    // Set up FlipDown
    var flipdown = new FlipDown(twoDaysFromNow)

        // Start the countdown
        .start()
});
//start active navbar
$('.hamburger').click(function () {
    $('.hamburger').toggleClass('active');
    $('.bottom-nav').toggleClass('acitve-nav');
    $('body').toggleClass('overflowNone')
});
// https://swiperjs.com/ 
// ===================== -->

var mySwiper = new Swiper('.swiper-container', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,
    speed: 1200,
    grabCursor: true,
    mousewheel: true,

    // If we need pagination
    pagination: {
        el: '.swiper-pagination',
        type: 'bullets',
        clickable: true,
    },

    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },

    on: {
        slideChangeTransitionStart: function () {
            // Slide captions
            var swiper = this;
            setTimeout(function () {
                var currentTitle = $(swiper.slides[swiper.activeIndex]).attr("data-title");
                var currentSubtitle = $(swiper.slides[swiper.activeIndex]).attr("data-subtitle");
            }, 500);
            gsap.to($(".current-title"), 0.4, { autoAlpha: 0, y: -40, ease: Power1.easeIn });
            gsap.to($(".current-subtitle"), 0.4, { autoAlpha: 0, y: -40, delay: 0.15, ease: Power1.easeIn });
        },
        slideChangeTransitionEnd: function () {
            // Slide captions
            var swiper = this;
            var currentTitle = $(swiper.slides[swiper.activeIndex]).attr("data-title");
            var currentSubtitle = $(swiper.slides[swiper.activeIndex]).attr("data-subtitle");
            $(".slide-captions").html(function () {
                return "<h2 class='current-title'>" + currentTitle + "</h2>" + "<h3 class='current-subtitle'>" + currentSubtitle + "</h3>";
            });
            gsap.from($(".current-title"), 0.4, { autoAlpha: 0, y: 40, ease: Power1.easeOut });
            gsap.from($(".current-subtitle"), 0.4, { autoAlpha: 0, y: 40, delay: 0.15, ease: Power1.easeOut });
        }
    }
});

// Slide captions
var currentTitle = $(mySwiper.slides[mySwiper.activeIndex]).attr("data-title");
var currentSubtitle = $(mySwiper.slides[mySwiper.activeIndex]).attr("data-subtitle");
$(".slide-captions").html(function () {
    return "<h2 class='current-title'>" + currentTitle + "</h2>" + "<h3 class='current-subtitle'>" + currentSubtitle + "</h3>";
});


//owl header screen 
$('.owl-header').owlCarousel({
    ltr: true,
    loop: true,
    margin: 20,
    nav: false,
    dots: true,
    autoplay: true,
    touchDrag: false,
    mouseDrag: false,
    autoWidth: false,
    animateOut: 'fadeOut',
    animateIn: 'fadeIn',
    autoplayTimeout: 2000,
    smartSpeed: 2000,
    dragEndSpeed: 2000,
    slidSpeed: 900,
    paginationSpeed: 900,
    autoplayHoverPause: true,
    items: 1
});
//partner slider 
$('.owl-partner').owlCarousel({
    ltr: true,
    loop: true,
    margin: 20,
    nav: false,
    dots: true,
    autoplay: true,
    touchDrag: true,
    mouseDrag: true,
    autoWidth: false,
    animateOut: 'fadeOut',
    animateIn: 'fadeIn',
    autoplayTimeout: 6000,
    smartSpeed: 2000,
    dragEndSpeed: 2000,
    slidSpeed: 900,
    paginationSpeed: 900,
    autoplayHoverPause: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 2
        },
        1000: {
            items: 4
        }
    }
});
$('.owl-single-product').owlCarousel({
    ltr: true,
    loop: true,
    margin: 0,
    nav: true,
    dots: false,
    smartSpeed: 2000,
    dragEndSpeed: 2000,
    slidSpeed: 900,
    paginationSpeed: 900,
    autoplayHoverPause: true,
    items: 1
});

$(window).scroll(function () {
    $scrollpos = $(this).scrollTop();
    if ($scrollpos >= 2000) {
        $('#scroll-btn').css({ 'opacity': '1' });

    }
    else {
        $('#scroll-btn').css({ 'opacity': '0' });
    }
});

$('#scroll-btn').click(function () {
    $('html,body').animate({ scrollTop: '0' }, 1000);

    return false;

});




