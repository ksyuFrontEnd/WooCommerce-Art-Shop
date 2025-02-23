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
        autoplay: {
            delay: 3000,
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
    $('main.main').on('click', '.quantity button', function() {
        let btn = $(this);
        let inputQty = btn.parent().find('.qty');
        let prevValue = +(inputQty.val());
        let newValue = 1;
       if( btn.hasClass( 'btn-plus' )) {
            newValue = prevValue + 1;
       } else {
            if( prevValue > 1 ) {
                newValue = prevValue - 1;
            }
       }
       inputQty.val(newValue);
       $('.update-cart').prop('disabled', false);
    });

    // Show and hide categories on the front-page
    let hiddenItems = $(".product-category.hidden");
    let showMoreBtn = $("#show-more");
    let itemsToShow = 3; 
    let initiallyVisible = 6; 

    hiddenItems.hide(); 

    if (hiddenItems.length === 0) {
        showMoreBtn.hide();
    }

    showMoreBtn.on("click", function() {
        let currentlyHidden = $(".product-category.hidden");

        if (currentlyHidden.length > 0) {
            currentlyHidden.slice(0, itemsToShow).slideDown().removeClass("hidden");

            if ($(".product-category.hidden").length === 0) {
                showMoreBtn.text("Сховати"); 
            }
        } else {
            $(".product-category").slice(initiallyVisible).addClass("hidden").hide();
            showMoreBtn.text("Показати ще");
        }
    });
});