<footer class="site-footer">
    <div class="container">
        <div class="top-footer">
            <div class="row gy-5">
                <div class="col-lg-3">
                    <div class="footer-details">
                        <div class="site-logo">
                            <a href="<?php echo esc_url(home_url('/')); ?>"><?php echo get_theme_mod('footer_main_title'); ?></a>
                        </div>
                        <div class="footer-info">
                            <div class="footer-item">
                                <span><?php echo get_theme_mod('footer_address_text'); ?></span>
                                <p><?php echo get_theme_mod('footer_address'); ?></p>
                            </div>
                            <div class="footer-item">
                                <span><?php echo get_theme_mod('footer_email_text'); ?></span>
                                <a href="<?php echo get_theme_mod('footer_email'); ?>"><?php echo get_theme_mod('footer_email'); ?></a>
                            </div>
                            <div class="footer-item">
                                <span><?php echo get_theme_mod('footer_phone_text'); ?></span>
                                <a href="#"><?php echo get_theme_mod('footer_phone_number'); ?></a>
                            </div>
                            <div class="default-btn_v2">
                                <a href="#" title="">
                                    <?php echo get_theme_mod('footer_get_direction_text'); ?>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10"
                                            viewBox="0 0 10 10" fill="none">
                                            <path d="M1 9L9 1M9 1H1.8M9 1V8.2" stroke="#fff" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                        <div class="social-links d-flex align-items-center gap-4">
                            <?php
                            // Define the platform slug and its corresponding FontAwesome icon class
                            $socials = array(
                                'facebook'  => 'fa-facebook-f',
                                'instagram' => 'fa-instagram',
                                'twitter'   => 'fa-x-twitter',
                                'youtube'   => 'fa-youtube',
                                'pinterest' => 'fa-pinterest-p',
                            );

                            foreach ($socials as $key => $icon) :
                                // Get the value from the Customizer
                                $url = get_theme_mod("polar_{$key}_url");

                                // Only show the <a> tag if the URL is NOT empty
                                if (! empty($url)) : ?>
                                    <a href="<?php echo esc_url($url); ?>" target="_blank">
                                        <i class="fa-brands <?php echo esc_attr($icon); ?>"></i>
                                    </a>
                            <?php endif;
                            endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="footer-menu">
                        <div class="footer-title">
                            <h3><?php echo get_theme_mod('footer_menu_1'); ?>  </h3>
                        </div>
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'footer_menu_1',
                            'menu_class' => 'footer-list list-none ps-0 mb-0',
                        ))
                        ?>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="footer-menu">
                        <div class="footer-title">
                            <h3><?php echo get_theme_mod('footer_menu_2'); ?></h3>
                        </div>
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'footer_menu_2',
                            'menu_class' => 'footer-list list-none ps-0 mb-0',
                        ))
                        ?>

                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="footer-menu">
                        <div class="footer-title">
                            <h3><?php echo get_theme_mod('footer_menu_3'); ?></h3>
                        </div>
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'footer_menu_3',
                            'menu_class' => 'footer-list list-none ps-0 mb-0',
                        ))
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="bot-footer">
            <div class="d-flex align-items-center justify-content-sm-between justify-content-center row-gap-3 flex-wrap">
                <div class="copywrite">
                    <p>© <?php echo date('Y'); ?> <?php bloginfo('name'); ?> . <?php echo get_theme_mod('footer_copyright_text'); ?></p>
                </div>
                <div class="partner">
                    <div class="d-flex gap-3">
                        <a href="#"><img src="images/visa.png" alt=""></a>
                        <a href="#"><img src="images/paypal.png" alt=""></a>
                        <a href="#"><img src="images/mastercard.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>


<?php wp_footer(); ?>
</body>

</html>