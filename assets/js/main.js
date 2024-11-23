jQuery(document).ready(function($) {
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
    $('body').on('adding_to_cart', function(e, btn, data) {
        btn.closest('.product-card').find('.add_to_cart_loader').fadeIn();
    })

    $('body').on('added_to_cart', function(e, response_fragments, response_cart_hash, btn) {
        btn.closest('.product-card').find('.add_to_cart_loader').fadeOut();
    })

    // Change quantity by click on + and -
    $('.quantity button').on('click', function() {
        let btn = $(this);
        let groupedProduct = btn.closest('.woocommerce-grouped-product-list-item__quantity').length;
        console.log(groupedProduct);
        
        let inputQty = btn.parent().find('.qty');
        let prevValue = +(inputQty.val());
        let newValue = groupedProduct ? 0 : 1;
       if( btn.hasClass( 'btn-plus' )) {
            newValue = prevValue + 1;
       } else {
            if (!groupedProduct && prevValue > 1) {
                newValue = prevValue - 1;
            } else if (groupedProduct && prevValue > 0) {
                newValue = prevValue - 1;
            }
       }
       inputQty.val(newValue);
    });
});
