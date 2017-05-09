var owl = $(".owl-carousel");

owl.owlCarousel({
    items: 5,
    margin: 10,
    loop: true,
    center: true,
    mouseDrag: true,
    touchDrag: true,
    nav: false,
    dots: false,
    lazyLoad: true,
    autoplay: true,
    autoplayTimeout: 7000,
    autoplayHoverPause: true
});

// set up keypress events
$(document).keydown(function(e) {
    if (e.keyCode === 37) {
        owl.trigger('prev.owl.carousel');
    } else if (e.keyCode === 39) {
        owl.trigger('next.owl.carousel');
    }
});