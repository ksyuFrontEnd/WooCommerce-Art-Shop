<?php get_header(); ?>

<main class="main">
    <!-- Front-page-slider__section -->
    <section class="section front-page-slider__section">
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
                                <a href="<?php the_permalink(); ?>">
                                    <div class="swiper-image">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>" class="slider__image" alt="<?php echo esc_attr(get_the_title()); ?>">
                                        <?php endif; ?>
                                        <div class="slider-caption">
                                            <h2><?php the_title(); ?></h2>
                                            <?php the_content(''); ?>
                                        </div>
                                    </div>
                                    
                                </a>
                            </div>
                        <?php endforeach; wp_reset_postdata(); ?>
                    </div>
                    
                    <div class="navigation-buttons">
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                    
                    <div class="swiper-pagination"></div>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Featured products -->
    <section class="section featured-products__section">
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
