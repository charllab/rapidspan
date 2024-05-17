<?php
$header = get_field('header');
if ($header) :
    $options = $header['banner_options'];
    ?>
<header id="header" class="header-height hero-nav-overlay with-<?php echo $option = ($options == 'light-top-dark-nav') ? 'dark' : 'light'; ?>-text position-relative">
    <nav class="navbar navbar-expand-lg w-100 z-index-200 p-75 px-lg-2">
        <a href="#main" class="skip-link">Skip Navigation</a>
        <div class="container-fluid">
            <div class="nav-logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php bloginfo('template_url'); ?>/images/logo-<?php echo $option = ($options == 'light-top-dark-nav') ? 'dark' : 'light'; ?>.png"
                         alt="<?php bloginfo('name'); ?> - Logo"
                         class="img-fluid d-none d-lg-block">
                    <img src="<?php bloginfo('template_url'); ?>/images/logo-dark.png"
                         alt="<?php bloginfo('name'); ?> - Logo"
                         class="img-fluid d-lg-none" aria-hidden="true">
                    <span class="sr-only"><?php bloginfo('name'); ?></span>
                </a>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainMenu"
                    aria-controls="mainMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


            <?php
            $thetel = get_field('phone_number', 'options');
            wp_nav_menu([
                'theme_location' => 'primary',
                'container_class' => 'collapse navbar-collapse d-lg-flex',
                'container_id' => 'mainMenu',
                'menu_class' => 'navbar-nav ms-lg-auto align-items-lg-center',
                'fallback_cb' => '',
                'menu_id' => 'main-menu',
                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s <li class="nav-item ps-0 ps-lg-75"><a href="tel:' . $thetel . '" class="nav-link tel-link">' . $thetel . '</a></li></ul>',
                'walker' => new bootstrap_5_wp_nav_menu_walker(),
            ]); ?>

        </div>
    </nav>


    <?php
    $banner_img = $header['banner_image'] ?? null;
    $header_decorative = ['header_decorative'] ?? false;
    ?>
    <section class="section-image position-relative">
        <img
            src="<?php echo $banner_img['url']; ?>" alt="<?php echo $banner_img['alt']; ?>"
            class="img-fluid object-fit-cover" aria-hidden="true">
        <?php if($options == 'solid-overlay'): ?>
            <div class="block__tint-overlay position-absolute z-index-2" style="opacity: .85 !important;"></div>
        <?php else: ?>
            <div class="block__tint-overlay for-general position-absolute z-index-3"></div>
            <div class="block__tint-overlay for-general-bottom position-absolute z-index-2"></div>
            <div class="block__tint-overlay for-<?php echo $option = ($options == 'light-top-dark-nav') ? 'dark' : 'light'; ?>-text position-absolute z-index-4"></div>
        <?php endif; ?>
        <div class="container header-container position-absolute z-index-10 w-100 h-100">
            <div class="row justify-content-center justify-content-center text-center h-100">
                <div class="col-lg-10">
                    <div class="top-content flex align-content-center justify-content-center h-100 pt-lg-1 pt-lg-3">
                        <?php
                        $above_header = $header['banner_title']['above_header'] ?? null; ?>
                        <?php if (!empty($above_header)): ?>
                            <p class="h3 text-uppercase mb-75 banner-above-header text-white"><?php echo $above_header; ?></p>
                        <?php endif; ?>
                        <h1 class="text-white"><?php echo $header['banner_title']['header']; ?></h1>
                        <?php if (!empty($header_decorative)): ?>
                            <div class="header-decorative d-flex justify-content-center mb-0 mt-150">
                                <span class="bg-white"></span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</header>
<?php endif; ?>