<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <?php $roxydev_theme_options = roxydev_theme_options(); ?>

    <div class="wrapper">
        <header class="header">
            <div class="header__container container">

                    <div class="logo">
                        <a href="<?php echo home_url( '/' ); ?>" class="header__logo-link">
                            <?php 
                            if ( function_exists( 'the_custom_logo' ) ) {
                                the_custom_logo();
                            } else {
                                bloginfo( 'name' ); 
                            }
                            ?>
                        </a>
                    </div> 

                    <div class="header__search-desktop">
                        <?php aws_get_search_form( true ); ?>
                    </div> 
                    
                    <div class="header__icons">
                        <!-- Search Icon for mobile only -->
                        <div class="header__icon search-icon">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/search.svg'); ?>" alt="Search">
                        </div>
                        <!-- Search Modal for mobile only -->
                        <div id="search-modal" class="search-modal">
                            <div class="search-modal__content">
                                <span class="search-modal__close">&times;</span>
                                <?php aws_get_search_form(true); ?>
                            </div>
                        </div>
                        <div class="header__icon registration-icon">
                            <a href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>">
                                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/registration.svg'); ?>" alt="Registration">
                            </a>
                        </div>
                        
                        <!-- Mini-cart ----------------------------------------------------------------------------->
                        <?php if ( ! is_cart() ): ?>
                            <div class="header-cart">
                                <!-- Cart icon -->
                                <div class="header__icon cart-icon">
                                    <a href="<?php echo esc_url(wc_get_cart_url()); ?>" id="cart-icon">
                                        <img class="cart-desktop" src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/cart.svg'); ?>" alt="Cart">
                                        <?php if (WC()->cart->get_cart_contents_count() > 0) : ?>
                                            <div class="cart-count" style="display: block">
                                                <?php echo WC()->cart->get_cart_contents_count(); ?>
                                            </div>
                                        <?php else : ?>
                                            <div class="cart-count" style="display: none">
                                                <?php echo WC()->cart->get_cart_contents_count(); ?>
                                            </div>
                                        <?php endif; ?>
                                    </a>
                                </div>
                            </div>  
                        <?php endif; ?>
                    </div> <!-- ./header__icons -->

                    <div class="header__menu menu">
                        <div class="menu__icon">
                            <!-- .menu__icon::before -->
                        </div>
                        <nav class="menu__body">
                            <?php wp_nav_menu(
                                array(
                                    'theme_location' => 'header-menu',
                                    'container' => false,
                                    'menu_id'              => false,    
                                    'echo'                 => true,
                                    'depth'                => 0,       
                                    'items_wrap'           => '<ul id="%1$s" class="menu_list %2$s">%3$s</ul>',
                                )); 
                            ?>
                        </nav>
                    </div><!--./header__menu menu -->
                
             </div><!--./container -->

        </header>
