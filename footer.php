        <footer class="footer">
            <div class="footer__container container">
                <div class="footer__social-icons">

                    <?php $roxydev_theme_options = roxydev_theme_options(); ?>
                
                    <ul class="social-icons">
                        <?php if( !empty( $roxydev_theme_options['instagram'] ) ) : ?>
                            <li>
                                <a href="<?php echo $roxydev_theme_options['instagram'] ?>" target="_blank">
                                    <div class="social-icons__icon">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/instagram_icon.svg" alt="Instagram">
                                    </div>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if( !empty( $roxydev_theme_options['facebook'] ) ) : ?>
                            <li>
                                <a href="<?php echo $roxydev_theme_options['facebook'] ?>" target="_blank">
                                <div class="social-icons__icon">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/facebook_icon.svg" alt="Facebook">
                                    </div>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if( !empty( $roxydev_theme_options['telegram'] ) ) : ?>
                            <li>
                                <a href="<?php echo $roxydev_theme_options['telegram'] ?>" target="_blank">
                                <div class="social-icons__icon">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/telegram_icon.svg" alt="Telegram">
                                    </div>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="footer__copyright-text">
                    <p>&copy; <?php echo date('Y'); ?> SoulCraft |</p>
                    <a href="<?php echo get_permalink( get_page_by_path( 'privacy-policy' ) ); ?>">
                        <p>All Rights Reserved</p>
                    </a>
                </div>
            </div>
        </footer>
    <?php wp_footer(); ?>
</div> <!--class="wrapper" -->
</body>
</html>