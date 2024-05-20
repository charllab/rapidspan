<?php
get_header();
?>

<main>
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <?php if (have_posts()) : ?>

                        <?php /* Start the Loop */ ?>

                        <?php while (have_posts()) : the_post(); ?>

                        <div class="blog-content-width">
                            <h2><?php the_title(); ?></h2>
                            <?php the_content(); ?>

                        </div>

                        <?php endwhile; ?>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</main>


<?php get_footer(); ?>
