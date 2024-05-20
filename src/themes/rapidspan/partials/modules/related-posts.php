<?php
if (isset($related_posts) && !empty($related_posts)) :
    ?>
    <div class="related-posts">
        <ul class="d-flex flex-row list-inline list-unstyled project-list py-1">
            <?php foreach ($related_posts as $post) : setup_postdata($post); ?>
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
            <?php endforeach; ?>
            <?php wp_reset_postdata(); ?>
        </ul>
    </div>
<?php
endif;
