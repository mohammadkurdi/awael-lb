// active tab in navbar
let pageName = window.location.pathname.split('/')[1]
if (pageName == '')
    $('nav li:first-child a hr').addClass('active')
else
    $('a[href="/' + pageName + '"] hr').addClass('active')


$('#recipeCarousel').carousel({
    interval: 10000
})

$('.carousel .carousel-item').each(function () {
    var minPerSlide = 3;
    var next = $(this).next();
    if (!next.length) {
        next = $(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));

    for (var i = 0; i < minPerSlide; i++) {
        next = next.next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }

        next.children(':first-child').clone().appendTo($(this));
    }
});