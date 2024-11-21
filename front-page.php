<?php get_header(); ?>

<main class="main">

    <!-- announcement-section -->
    <section class="announcement-section first-section section">
        <div class="announcement-section__container">
            <a href="/" class="announcement-section__link">
                <h6>Отримати новорічну знижку 10%</h6>
            </a> 
        </div>
    </section>

    <!-- front-page-slider__section -->
    <section class="front-page-slider__section section">
        <div class="container">
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
                    
                    <div class="navigation">
                        <div class="button-next">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/right_arrow_icon.svg'); ?>" alt="arrow right">
                        </div>
                        <div class="button-prev">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/left_arrow_icon.svg'); ?>" alt="arrow left">
                        </div>
                    </div>

                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Categories section -->
    <section class="categories__section section">
        <div class="container">
            <h2 class="section__title categories__title">
                <span><?php _e( 'Categories', 'roxydev' )?></span>
            </h2>
            <div class="categories__wrapper">
                <?php echo do_shortcode( '[product_categories]' ); ?>
            </div>
        </div>
    </section>

    <!-- featured-products__section -->
    <section class="featured-products__section section">
        <div class="container">
            <h2 class="section__title featured-products__title">
                <span><?php _e( 'Featured products', 'roxydev' )?></span>
            </h2>
            <div class="featured-products__wrapper">
                <?php echo do_shortcode( '[featured_products limit="8"]' ); ?>
            </div>

        </div>
    </section>
</main>

<?php get_footer(); ?>
