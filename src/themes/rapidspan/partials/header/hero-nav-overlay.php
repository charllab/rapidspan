<?php
$header = get_field('header');
$phone_number = get_field('phone_number', 'options');
$banner_options = $header['banner_options'] ?? 'default';
$option = ($banner_options == 'light-top-dark-nav') ? 'dark' : 'light';
$banner_img = $header['banner_image'] ?? null;
$header_decorative = !empty($header['banner_title']['header_decorative']) ? $header['banner_title']['header_decorative'] : false;
?>

<header id="header" class="header-height hero-nav-overlay with-<?php echo esc_attr($option); ?>-text position-relative">
    <nav class="navbar navbar-expand-lg w-100 z-index-200 p-75 px-lg-2">
        <a href="#main" class="skip-link">Skip Navigation</a>
        <div class="container-fluid">
            <div class="nav-logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php bloginfo('template_url'); ?>/images/logo-<?php echo esc_attr($option); ?>.png"
                         alt="<?php bloginfo('name'); ?> - Logo" class="img-fluid d-none d-lg-block">
                    <img src="<?php bloginfo('template_url'); ?>/images/logo-dark.png"
                         alt="<?php bloginfo('name'); ?> - Logo" class="img-fluid d-lg-none" aria-hidden="true">
                    <span class="sr-only"><?php bloginfo('name'); ?></span>
                </a>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainMenu"
                    aria-controls="mainMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <?php
            wp_nav_menu([
                'theme_location' => 'primary',
                'container_class' => 'collapse navbar-collapse d-lg-flex',
                'container_id' => 'mainMenu',
                'menu_class' => 'navbar-nav ms-lg-auto align-items-lg-center',
                'fallback_cb' => '',
                'menu_id' => 'main-menu',
                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s <li class="nav-item ps-0 ps-lg-75"><a href="tel:' . esc_attr($phone_number) . '" class="nav-link tel-link">' . esc_html($phone_number) . '</a></li></ul>',
                'walker' => new bootstrap_5_wp_nav_menu_walker(),
            ]);
            ?>
        </div>
    </nav>

    <?php if ($header): ?>
        <section class="section-image position-relative">
            <?php if ($banner_img): ?>
                <img src="<?php echo esc_url($banner_img['url']); ?>" alt="<?php echo esc_attr($banner_img['alt']); ?>"
                     class="img-fluid object-fit-cover" aria-hidden="true">
            <?php endif; ?>
            <?php if ($banner_options == 'solid-overlay'): ?>
                <div class="block__tint-overlay position-absolute z-index-2" style="opacity: .85 !important;"></div>
            <?php else: ?>
                <div class="block__tint-overlay for-general position-absolute z-index-3"></div>
                <div class="block__tint-overlay for-general-bottom position-absolute z-index-2"></div>
                <div class="block__tint-overlay for-<?php echo esc_attr($option); ?>-text position-absolute z-index-4"></div>
            <?php endif; ?>
            <div class="container header-container position-absolute z-index-10 w-100 h-100">
                <div class="row justify-content-center text-center h-100">
                    <div class="col-lg-10">
                        <div class="top-content flex align-content-center justify-content-center h-100 pt-lg-1 pt-lg-3"
                             data-aos="zoom-out"
                             data-aos-offset="0"
                             data-aos-delay="0"
                             data-aos-duration="500"
                             data-aos-easing="ease"
                             data-aos-mirror="false"
                             data-aos-once="false"
                        >
                            <?php if (!empty($header['banner_title']['above_header'])): ?>
                                <p class="h3 text-uppercase mb-75 banner-above-header text-white"><?php echo esc_html($header['banner_title']['above_header']); ?></p>
                            <?php endif; ?>
                            <h1 class="text-white"><?php echo esc_html($header['banner_title']['header'] ?? ''); ?></h1>
                            <?php if ($header_decorative): ?>
                                <div class="header-decorative d-flex justify-content-center mb-0 mt-150">
                                    <span class="bg-white"></span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php elseif (have_posts()): ?>
        <?php while (have_posts()): the_post(); ?>
            <section class="section-image position-relative">
                <?php if (has_post_thumbnail()):
                    $featured_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
                    ?>
                    <img src="<?php echo esc_url($featured_image_url[0] ?? ''); ?>" alt="" class="img-fluid object-fit-cover the-section-image" aria-hidden="true">
                <?php endif; ?>
                <div class="block__tint-overlay position-absolute z-index-2" style="opacity: .85 !important;"></div>
                <div class="container header-container position-absolute z-index-10 w-100 h-100">
                    <div class="row justify-content-center text-center h-100">
                        <div class="col-lg-10">
                            <div class="top-content flex align-content-center justify-content-center h-100 pt-lg-1 pt-lg-3"
                                 data-aos="zoom-out"
                                 data-aos-offset="0"
                                 data-aos-delay="0"
                                 data-aos-duration="500"
                                 data-aos-easing="ease"
                                 data-aos-mirror="false"
                                 data-aos-once="false"
                            >
                                <p class="h3 text-uppercase mb-75 banner-above-header text-white">
                                    <?php echo esc_html(get_post_type() == 'project' ? 'Project' : 'Blog'); ?>
                                </p>
                                <h1 class="text-white"><?php the_title(); ?></h1>
                                <?php if ($header_decorative): ?>
                                    <div class="header-decorative d-flex justify-content-center mb-0 mt-150">
                                        <span class="bg-white"></span>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endwhile; ?>
    <?php endif; ?>
</header>
