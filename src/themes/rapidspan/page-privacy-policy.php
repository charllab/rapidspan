<?php
/**
 *
 * Template Name: Privacy Policy
 *
 **/
get_header();
?>

<main id="main">
    <section class="my-2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8">
                    <?php if (have_posts()) : ?>

                        <?php /* Start the Loop */ ?>

                        <?php while (have_posts()) : the_post(); ?>

                            <?php the_content(); ?>

                        <?php endwhile; ?>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <?php get_template_part('partials/body/flexible-content'); ?>
</main>


<?php get_footer(); ?>
