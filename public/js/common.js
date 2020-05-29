$('.owl-carousel').owlCarousel({
    loop:true,
    margin:40,
    nav: false,
    dots: false,
    autoplay: true,
    autoplayHoverPause: true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})

const owl = $('.owl-carousel');

owl.owlCarousel();
$('.customNextBtn').click(function() {
    owl.trigger('next.owl.carousel');
})

$('.customPrevBtn').click(function() {
    owl.trigger('prev.owl.carousel', [300]);
})

// MAIN HOME BLOCK CAROUSEL

const items = document.querySelectorAll('.main-carousel-item')

let leftPos = 0
let lastItem = items[items.length - 1]

items.forEach(element => {
    element.style.left = leftPos + 'px'
    leftPos += element.offsetWidth
    leftPos += 80
})

setInterval(function() {
    items.forEach(element => {
        element.style.left = element.getBoundingClientRect().left - 1 + 'px'
        if (element.getBoundingClientRect().left <= -element.offsetWidth) {
            element.style.left = lastItem.getBoundingClientRect().left + element.offsetWidth + 80 + 'px'
            lastItem = element
        }
    })
}, 10)