<?php
get_header();
?>

<main class="z-index-1">
    <section class="py-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <?php if (have_posts()) : ?>


                        <?php

                        get_template_part('partials/modules/post-options');

                        /* Start the Loop */ ?>

                        <?php while (have_posts()) : the_post(); ?>

                            <div class="blog-content-width">
                                <h2><?php the_title(); ?></h2>
                                <?php the_content();
                                $post_type = get_post_type();
                                ?>
                                <a href="<?php echo $all = ($post_type == 'project') ? esc_url(home_url('/projects')) : esc_url(home_url('/blog')) ?>" class="btn btn-primary my-2">Back To All <?php echo $type = ($post_type == 'project') ? 'Project' : 'Posts'; ?></a>
                            </div>

                            <h4>Related <?php echo $type = ($post_type == 'project') ? 'Projects' : 'Posts'; ?></h4>
                            <hr>
                            <section>
                            <?php
                            // Fetch related posts for the current project post
                            if($post_type == 'project') {
                                $related_posts = get_related_posts(get_the_ID(), 'project', 'category'); // Adjust 'project' and 'project_category' as needed
                            } else {
                                $related_posts = get_related_posts(get_the_ID(), 'post', 'category'); // Adjust 'project' and 'project_category' as needed
                            }
                            set_query_var('related_posts', $related_posts);
                            get_template_part('partials/modules/related-posts');
                            ?>

                        <?php endwhile; ?>
                        </section>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</main>


<?php get_footer(); ?>
