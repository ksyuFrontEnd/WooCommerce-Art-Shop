// Slider on the front page
document.addEventListener('DOMContentLoaded', function () {
    new Swiper('.frontPageSwiper', {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        navigation: {
            nextEl: '.button-next',
            prevEl: '.button-prev',
        },
    });
});
