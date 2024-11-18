document.addEventListener('DOMContentLoaded', function () {

    // Slider on the front page
    new Swiper('.frontPageSwiper', {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        navigation: {
            nextEl: '.button-next',
            prevEl: '.button-prev',
        },
    });

    // Add_to_cart_loader on the product card
    jQuery('body').on('adding_to_cart', function(e, btn, data) {
        btn.closest('.product-card').find('.add_to_cart_loader').fadeIn();
    })

    jQuery('body').on('added_to_cart', function(e, response_fragments, response_cart_hash, btn) {
        btn.closest('.product-card').find('.add_to_cart_loader').fadeOut();
    })
    
});
