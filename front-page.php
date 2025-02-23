<?php get_header(); ?>

<main class="main">

    <!-- announcement-section -->
    <section class="announcement-section first-section section">
        <div class="announcement-section__container">
            <p class="announcement-section__paragraph">Where Every Piece Has a Soul</p> 
        </div>
    </section>

    <!-- front-page-slider__section -->
    <section class="front-page-slider__section section">
        <div class="front-page-slider__container">
            <?php
            $args = array(
                'post_type'      => 'slider',  
                'posts_per_page' => -1,      
                'orderby'        => 'date',  
                'order'          => 'DESC',  
            );
            $frontPageSlides = get_posts($args);

            if ($frontPageSlides) : ?>
                <div class="swiper-container frontPageSwiper">
                    <div class="swiper-wrapper">
                        <?php foreach ($frontPageSlides as $post) : setup_postdata($post); ?>
                            <div class="swiper-slide">
                                <div class="swiper-image">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>" class="slider__image" alt="<?php echo esc_attr(get_the_title()); ?>">
                                    <?php endif; ?>
                                </div>
                                <div class="swiper-caption">
                                    <div class="swiper-caption__inner">
                                        <h2><?php the_title(); ?></h2>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; wp_reset_postdata(); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- categories section -->
    <section class="categories__section section">
        <div class="container">
            <div class="categories__wrapper">
                <div class="woocommerce columns-4">
                    <div class="products featured-products__cards">
                        <?php
                        $categories = get_terms([
                            'taxonomy'   => 'product_cat',
                            'hide_empty' => true,
                        ]);

                        if (!empty($categories) && !is_wp_error($categories)) :
                            $count = 0;
                            foreach ($categories as $category) :
                                $class = ($count >= 6) ? 'hidden' : ''; 
                                $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true); 
                                $image_url = $thumbnail_id ? wp_get_attachment_url($thumbnail_id) : wc_placeholder_img_src(); 
                                ?>
                                <div class="product-card__category product-category product <?php echo $class; ?>">
                                    <a href="<?php echo get_term_link($category); ?>">
                                        <div class="category-image">
                                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($category->name); ?>">
                                        </div>
                                        <h5 class="category-title"><?php echo $category->name; ?></h5>    
                                    </a>
                                </div>
                                <?php
                                $count++;
                            endforeach;
                        endif;
                        ?>
                    </div>
                </div>
            </div>
            <button id="show-more" class="show-more btn">Показати ще</button>
        </div>
    </section>

    <!-- featured-products__section -->
    <section class="featured-products__section section">
        <div class="container">
            <h2 class="section__title featured-products__title">
                <span>Топ продажів</span>
            </h2>
            <div class="featured-products__wrapper">
                <?php echo do_shortcode( '[featured_products limit="4"]' ); ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
