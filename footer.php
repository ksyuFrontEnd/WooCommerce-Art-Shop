        <div class="footer">
            <div class="container">
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
            </div>
        </div>
    
    </div> <!--class="wrapper" -->
<?php wp_footer(); ?>
</body>
</html>