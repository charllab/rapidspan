<?php
$body = get_field('body');
if ($body) :
    $layouts = $body['layout'];
    if ($layouts) : ?>
        <?php $counter = 0;
        foreach ($layouts as $layout) : ?>
            <?php if ($layout['acf_fc_layout'] == 'media_and_text'): ?>

                <?php
                $media = $layout['structure']['media'];
                $content = $layout['structure']['content_block'];
                $buttons = $content['buttons'];
                ?>

            <?php elseif ($layout['acf_fc_layout'] == 'content_block'): ?>

                <?php
                $background_image = $layout['background_image'] ?? null;
                $content_width = $layout['content_width'] ?? null;
                $spacing = $layout['spacing'] ?? [];
                $py = in_array('py-7', $spacing) ? 'py-7' : '';
                $my = in_array('my-7', $spacing) ? 'my-7' : '';

                // Initialize classes array
                $classes = ['full-width-content', 'my-5', 'py-5', 'position-relative', 'z-index--1'];

                // Conditional classes
                if (!empty($background_image)) {
                    $classes[] = 'full-width-content--dark';
                }
                if (!empty($py)) {
                    $classes[] = 'py-7';
                }
                if (!empty($my)) {
                    $classes[] = 'my-7';
                }

                // Convert classes array to string
                $classes_string = implode(' ', $classes);

                // Extract content block from structure
                $content_block = $layout['structure']['content_block'] ?? [];
                ?>

                <section class="<?php echo esc_attr($classes_string); ?>">
                    <?php if (!empty($background_image)): ?>
                        <img src="<?php echo esc_url($background_image['url']); ?>" alt="<?php echo esc_attr($background_image['url']); ?>"
                             class="full-width-content--dark--bg position-absolute z-index-1"
                             aria-hidden="true">
                        <div class="block__img-overlay position-absolute z-index-1" aria-hidden="true"></div>
                    <?php endif; ?>
                    <div class="container position-relative z-index-2">
                        <div class="row justify-content-center">
                            <div class="col-md-10 <?php echo esc_attr($content_width); ?> text-center">

                                <?php
                                // Set the variables you need in the partial
                                set_query_var('content_block', $content_block);
                                get_template_part('partials/modules/content-block');
                                ?>

                            </div><!--col-->
                        </div><!--row-->
                    </div><!--container-->
                </section>

            <?php elseif ($layout['acf_fc_layout'] == 'columned_content'): ?>

                <?php
                $background_image = $layout['background_image'] ?? null;
                $content_width = $layout['content_width'] ?? null;
                $spacing = $layout['spacing'] ?? [];
                $py = in_array('py-7', $spacing) ? 'py-7' : '';
                $my = in_array('my-7', $spacing) ? 'my-7' : '';

                // Initialize classes array
                $classes = ['full-width-content', 'my-5', 'py-5', 'position-relative', 'z-index--1'];

                // Conditional classes
                if (!empty($background_image)) {
                    $classes[] = 'full-width-content--dark';
                }
                if (!empty($py)) {
                    $classes[] = 'py-7';
                }
                if (!empty($my)) {
                    $classes[] = 'my-7';
                }

                // Convert classes array to string
                $classes_string = implode(' ', $classes);

                // Extract left and right content blocks from the layout
                $column_left = $layout['columned_content']['structure']['column_left'] ?? [];
                $column_right = $layout['columned_content']['structure']['column_right'] ?? [];
                ?>

                <section class="<?php echo esc_attr($classes_string); ?>">
                    <?php if (!empty($background_image)): ?>
                        <img src="<?php echo esc_url($background_image['url']); ?>" alt="<?php echo esc_attr($background_image['url']); ?>"
                             class="full-width-content--dark--bg position-absolute z-index-1"
                             aria-hidden="true">
                        <div class="block__img-overlay position-absolute z-index-1" aria-hidden="true"></div>
                    <?php endif; ?>
                    <div class="container position-relative z-index-2">
                        <div class="row justify-content-around">
                            <div class="col-xl-5 col-xxxl-4 text-center">
                                <?php
                                // Set the variables you need in the partial for the left column
                                set_query_var('content_block', $column_left['content_block']);
                                get_template_part('partials/modules/content-block');
                                ?>
                            </div>
                            <div class="col-xl-5 col-xxxl-4 text-center">
                                <?php
                                // Set the variables you need in the partial for the right column
                                set_query_var('content_block', $column_right['content_block']);
                                get_template_part('partials/modules/content-block');
                                ?>
                            </div>
                        </div>
                    </div>
                </section>

            <?php elseif ($layout['acf_fc_layout'] == 'cards'): ?>
                <?php $cards = $layout['structure']['cards']; ?>
                <p>This is cards</p>
                <!--            --><?php //dump($cards); ?>


            <?php elseif ($layout['acf_fc_layout'] == 'carousel'): ?>
                <!--            --><?php //$carousel = $layout['structure']['carousel']; ?>
                <p>please add your slider code here</p>
                <!--            --><?php //dump($carousel); ?>
            <?php endif;
            $counter++;
        endforeach;
        wp_reset_postdata();
        ?>
    <?php endif;
endif; ?>
