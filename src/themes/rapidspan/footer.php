<footer>
    <section class="pt-2 pb-150 bg-soft">
        <div class="container">
            <div class="row flex-column justify-content-center">
                <div class="col-12 text-center text-white">
                    <div>
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            <img src="<?php bloginfo('template_url'); ?>/images/footer-logo.png"
                                 alt="<?php bloginfo('name'); ?> - Logo"
                                 class="img-fluid footer-logo mb-1 mb-md-2">
                            <span class="sr-only"><?php bloginfo('name'); ?></span>
                        </a>
                    </div>
                    <div class="d-xs-flex justify-content-center mb-1">
                        <div class="mb-50 mb-xs-0">
                            <img src="<?php bloginfo('template_url'); ?>/images/ico-phone.svg"
                                                        alt="Icon of a phone" class="d-inline-block"> <a
                                href="tel: <?php echo get_field('phone_number', 'options'); ?>"
                                class="me-xs-75"><?php echo get_field('phone_number', 'options'); ?></a></div>
                        <div>
                            <img src="<?php bloginfo('template_url'); ?>/images/ico-envelope.svg"
                                  alt="Icon of an envelope" class="d-inline-block me-250"> <a
                                href="mailto:<?php echo get_field('email_address', 'options'); ?>"><?php echo get_field('email_address', 'options'); ?></a>
                        </div>
                    </div>
                    <div class="footernav d-none d-lg-block">
                        <?php wp_nav_menu([
                            'theme_location' => 'secondary',
                            'container_class' => 'container',
                            'container_id' => 'secondarynav',
                            'menu_class' => 'navbar-nav mx-auto flex-row justify-content-center mb-0',
                            'fallback_cb' => '',
                            'menu_id' => 'menu-footer-menu',
                            'walker' => new bootstrap_5_wp_nav_menu_walker(),
                        ]); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="footer-bar bg-dark text-white">
        <div class="container d-md-flex text-center pt-1 pb-75">
            <div>
                <p class="mb-250">&copy; 2024 <?php bloginfo('name'); ?><span
                        class="d-none d-lg-inline"> <?php bloginfo('description'); ?></span>
                    <span class="ms-md-250 d-none d-md-inline"> | </span>
                </p>
            </div>
            <div class="ps-md-250">
                <p class="mb-250"><a href="<?php echo esc_url(home_url('/privacy-policy')); ?>" class="text-white">Privacy Policy</a>
                </p>
            </div>
            <div class="ms-md-auto">
                <p class="mb-250">
                    <a href="https:sproing.ca" title="Visit Sproing Creative" class="text-white">Website by Sproing<span
                            class="d-none d-lg-inline"> Creative</span></a>
                </p>
            </div>
        </div>
    </section>
</footer>

<?php wp_footer(); ?>

</body>

</html>