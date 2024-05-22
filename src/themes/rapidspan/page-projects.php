<?php
/* Template Name: Projects Listing Page */

get_header(); ?>

<main class="z-index-1 py-2">
    <?php get_template_part('partials/body/flexible-content'); ?>

    <?php
    // Get all categories
    $categories = get_categories(array(
        'taxonomy' => 'category',
        'orderby' => 'name',
        'order'   => 'ASC',
        'hide_empty' => true,
    ));

    if ($categories) : ?>
        <section>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="accordion" id="accordionExample">
                            <?php
                            $tabcounter = 0;
                            foreach ($categories as $category) :
                                $args = array(
                                    'post_type' => 'project',
                                    'posts_per_page' => -1,
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => 'category',
                                            'field'    => 'term_id',
                                            'terms'    => $category->term_id,
                                        ),
                                    ),
                                );
                                $category_posts = new WP_Query($args);

                                if ($category_posts->have_posts()) : ?>
                                    <div class="accordion-item border-0 mb-50">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button rounded-0" type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#collapse--<?php echo $tabcounter; ?>"
                                                    aria-expanded="true"
                                                    aria-controls="collapse--<?php echo $tabcounter; ?>">
                                                <?php echo esc_html($category->name); ?>
                                            </button>
                                        </h2>
                                        <div id="collapse--<?php echo $tabcounter; ?>"
                                             class="accordion-collapse collapse <?php echo $tabcounter === 0 ? 'show' : ''; ?>"
                                             data-bs-parent="#accordionExample">
                                            <ul class="d-flex flex-row list-inline list-unstyled project-list pt-1 pb-50 mb-0">
                                                <?php while ($category_posts->have_posts()) : $category_posts->the_post(); ?>
                                                    <li class="list-inline-item list-item-project">
                                                        <a href="<?php the_permalink(); ?>" class="position-relative">
                                                            <?php
                                                            if (has_post_thumbnail()) :
                                                                $thumbnail_id = get_post_thumbnail_id();
                                                                $thumbnail_url = get_the_post_thumbnail_url(null, 'full');
                                                                $thumbnail_alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
                                                                ?>
                                                                <img
                                                                    src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php echo esc_attr($thumbnail_alt); ?>"
                                                                    class="img-fluid d-block object-fit-cover" aria-hidden="true">
                                                            <?php else: ?>
                                                                <img
                                                                    src="<?php bloginfo('template_url'); ?>/images/fallback-nothing.png" alt=" "
                                                                    class="img-fluid d-block object-fit-cover fallback-nothing" aria-hidden="true">
                                                            <?php endif; ?>
                                                            <div class="list-item-project-title position-absolute text-center p-75">
                                                                <div class="title-wrapper position-relative">
                                                                    <img src="<?php bloginfo('template_url'); ?>/images/ico-bridge.png"
                                                                         alt=" "
                                                                         class="project-bride-icon img-fluid mx-auto">
                                                                    <h3 class="text-uppercase text-white mb-0"><?php the_title(); ?></h3>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                <?php endwhile; ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <?php $tabcounter++;
                                endif;
                                wp_reset_postdata();
                            endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php else : ?>
        <p><?php _e('No categories found.'); ?></p>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
