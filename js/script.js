$(document).ready(function(){
    $('.slider').slick({
        arrows: true,
        dots: true,
        draggable: false,
        speed: 1000,
        autoplay: true,
        autoplaySpeed: 8000,
        appendArrows:$('.org .interface .arrows'),
        appendDots:$('.org .interface .dots')
    });
});