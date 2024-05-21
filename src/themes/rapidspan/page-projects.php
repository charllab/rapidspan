<?php
/* Template Name: Projects Listing Page */

get_header(); ?>

<main class="z-index-1">
<?php get_template_part('partials/body/flexible-content'); ?>

    <?php
    $args = array(
        'post_type' => 'project',
        'posts_per_page' => 10, // Number of posts per page
    );
    $blog_posts = new WP_Query($args);

    if ($blog_posts->have_posts()) : ?>
        <section>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <ul class="d-flex flex-row list-inline list-unstyled project-list py-1">
                            <!--repeater start-->
                            <?php while ($blog_posts->have_posts()) : $blog_posts->the_post(); ?>
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

                            <!--repeater end-->
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <div class="pagination">
            <?php
            // Pagination
            echo paginate_links(array(
                'total' => $blog_posts->max_num_pages
            ));
            ?>
        </div>
    <?php else : ?>
        <p><?php _e('No posts found.'); ?></p>
    <?php endif; ?>

    <?php wp_reset_postdata(); ?>
</main>
<?php get_footer(); ?>
