<?php get_header(); ?>

<main class="main">
    <section class="first-section section">
        <div class="container">
    
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                <?php the_content(); ?>

            <?php endwhile; else: ?>
                <p>Записів немає.</p>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>