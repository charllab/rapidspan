<?php
get_header();
?>

<main class="z-index-1">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <section class="py-3">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-10">
                            <?php

                            get_template_part('partials/modules/post-options');

                            /* Start the Loop */ ?>
                        </div>
                    </div>
                    <?php $details = get_field('project_details');
                    $location = $details['location'] ?? null;
                    $owner = $details['owner'] ?? null;
                    $map = $details['map'] ?? [];
                    if (!empty($details)): ?>
                        <div class="row justify-content-center">
                            <div class=" <?php echo $isthereamap = (!empty($map))? 'col-lg-6' : 'col-lg-10' ; ?>">
                                <div class="blog-content-width">
                                    <h2><?php the_title(); ?></h2>
                                    <table class="table project-table">
                                        <tbody>
                                        <?php if (!empty($location)): ?>
                                            <tr>
                                                <td class="td-header">Location:</td>
                                                <td><?php echo $location; ?></td>
                                            </tr>
                                        <?php endif; ?>

                                        <?php if (!empty($owner)): ?>
                                            <tr>
                                                <td class="td-header">Owner:</td>
                                                <td><?php echo $owner; ?></td>
                                            </tr>
                                        <?php endif; ?>
                                        <tr>
                                            <td class="td-header">About:</td>
                                            <td>
                                                <?php the_content(); ?>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <?php $post_type = get_post_type();
                                    ?>
                                    <a href="<?php echo $all = ($post_type == 'project') ? esc_url(home_url('/projects')) : esc_url(home_url('/blog')) ?>"
                                       class="btn btn-primary my-2">Back To
                                        All <?php echo $type = ($post_type == 'project') ? 'Project' : 'Posts'; ?></a>
                                </div>
                            </div>
                            <?php if(!empty($map)): ?>
                            <div class="col-lg-4">
                                <div class="js-gallery">
                                <a href="<?php echo $map['url']; ?>" class="js-gallery-item">
                                <img src="<?php echo $map['url']; ?>" alt="<?php echo $map['alt']; ?>" class="img-fluid object-fit-contain">
                                </a>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    <?php else: ?>
                        <div class="row justify-content-center">
                            <div class="col-lg-10">
                                <div class="blog-content-width">
                                    <h2><?php the_title(); ?></h2>
                                    <?php the_content();
                                    $post_type = get_post_type();
                                    ?>
                                    <a href="<?php echo $all = ($post_type == 'project') ? esc_url(home_url('/projects')) : esc_url(home_url('/blog')) ?>"
                                       class="btn btn-primary my-2">Back To
                                        All <?php echo $type = ($post_type == 'project') ? 'Project' : 'Posts'; ?></a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="row justify-content-center mt-1 mt-lg-0">
                        <div class="col-12 col-lg-10">
                            <h4>Related <?php echo $type = ($post_type == 'project') ? 'Projects' : 'Posts'; ?></h4>
                            <hr>
                            <section>
                                <?php
                                // Fetch related posts for the current project post
                                if ($post_type == 'project') {
                                    $related_posts = get_related_posts(get_the_ID(), 'project', 'category'); // Adjust 'project' and 'project_category' as needed
                                } else {
                                    $related_posts = get_related_posts(get_the_ID(), 'post', 'category'); // Adjust 'project' and 'project_category' as needed
                                }
                                set_query_var('related_posts', $related_posts);
                                get_template_part('partials/modules/related-posts');
                                ?>

                            </section>
                        </div>
                    </div>
                </div>
            </section>
        <?php endwhile; ?>
    <?php endif; ?>
</main>


<?php get_footer(); ?>
