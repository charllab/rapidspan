<?php
/**
 *
 * Template Name: Contact Page
 *
 **/
get_header(); ?>

    <main class="z-index-1">

        <div class="py-3">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-6">
                    <div class="ps-50">
                        <?php if (have_posts()) : ?>

                            <?php /* Start the Loop */ ?>

                            <?php while (have_posts()) : the_post(); ?>

                                <?php the_content(); ?>

                            <?php endwhile; ?>

                        <?php endif; ?>
                    </div>
                        <?php get_template_part('partials/body/flexible-content'); ?>

                    </div><!-- col -->

                    <div class="col-lg-5">
                        <div class="pt-2 pb-1 px-1 bg-light">
                            <h4>Contact Information</h4>
                            <?php
                            $removethese = array("(", " ", ")", "-");
                            ?>
                            <table class="address-table">
                                <tr>
                                    <td><strong>Phone: </strong></td>
                                    <td>
                                        <a href="tel:+1<?php echo strip_tel(get_field('phone_number', 'options')); ?>"><?php echo get_field('phone_number', 'options'); ?></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>E-mail: </strong></td>
                                    <td>
                                        <a href="mailto:<?php echo get_field('email_address', 'options'); ?>"><?php echo get_field('email_address', 'options'); ?></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Address: </strong></td>
                                    <td><?php echo get_field('physical_address', 'options'); ?></td>
                                </tr>
                            </table>
                        </div><!-- bg-light -->

                        <div class="px-0">
                            <?php
                            echo get_field('map_embed_code', 'option');
                            ?>
                        </div><!-- px-0 -->
                    </div><!-- col -->
                </div><!-- row -->

            </div><!-- container -->
        </div>

    </main>

<?php get_footer();