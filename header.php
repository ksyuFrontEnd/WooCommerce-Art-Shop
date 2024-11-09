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
            <div class="header__logo">
                <a href="<?php echo home_url( '/' ); ?>" class="header__logo-link"><?php bloginfo( 'name' ); ?></a>
            </div>
            <div class="header__menu">
                <?php wp_nav_menu(
                    array(
                        'theme_location' => 'header-menu',
                        'container' => false,
                    )
                ); 
                ?>
            </div>
            <div class="header__social-icons">
                <ul class="social-icons">
                    <?php if( !empty( $roxydev_theme_options['instagram'] ) ) : ?>
                        <li>
                            <a href="<?php echo $roxydev_theme_options['instagram'] ?>">
                                <p>My Instagram</p>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if( !empty( $roxydev_theme_options['facebook'] ) ) : ?>
                        <li>
                            <a href="<?php echo $roxydev_theme_options['facebook'] ?>">
                                <p>My Facebook</p>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if( !empty( $roxydev_theme_options['telegram'] ) ) : ?>
                        <li>
                            <a href="<?php echo $roxydev_theme_options['telegram'] ?>">
                                <p>My Telegram</p>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
                
            </div>

        </header>