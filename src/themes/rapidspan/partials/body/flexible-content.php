<?php
$body = get_field('body');
if ($body) :
    $layouts = $body['layout'];
    if ($layouts) : ?>
        <?php $counter = 0;
        foreach ($layouts as $layout) : ?>
            <?php if ($layout['acf_fc_layout'] == 'media_and_text'): ?>

                <?php
                //acf fields data
                // structure > media (group)
                $media = $layout['structure']['media'];
                // structure > text (group)
                $text = $layout['structure']['text'];
                // structure > text > button (group)
                $buttons = $layout['structure']['text']['buttons']['button'];

                $image = $media['image'];
                $alignment = $media['alignment'];
                $above_header = $text['above_header'];
                $header = $text['header'];
                $text = $text['content'];
                ?>

                <section class="text-media-blocked pt-xl-3">
                    <div class="container">
                        <div class="row align-items-center g-lg-3">
                            <div class="col-lg-6">
                                <?php if (!empty($above_header)): ?>
                                    <h6 class="d-block"><?php echo $above_header; ?></h6>
                                <?php endif; ?>
                                <h2 class="h1">
                                    <span><?php echo $header; ?></span>
                                </h2>
                                <div class="mb-175">
                                    <?php echo $text; ?>
                                </div><!-- mb -->
                                <?php if (!empty($buttons)): ?>
                                    <div class="column-content--button-set mb-1 mb-md-0">
                                        <?php foreach ($buttons as $button) :
                                            $target = $button['link']['target'] ?>
                                            <a href="<?php echo esc_url($button['link']['url']); ?>"
                                               class="btn <?php echo $button['style']; ?> mb-1"
                                                <?php if (!empty($target)): ?>
                                                    target="<?php echo $target ?>"
                                                <?php endif; ?>
                                            >
                                                <?php echo $button['link']['title']; ?>
                                            </a>
                                        <?php endforeach; ?>
                                    </div><!-- column-content--button-set -->
                                <?php endif; ?>
                            </div><!-- col -->
                            <div class="col-lg-6 order-lg-<?php echo $alignment; ?> h-100">
                                <img src="<?php echo esc_url($image['url']); ?>"
                                     class="mb-150 mb-lg-0 h-100 img-fluid card-img-top rounded border border-dark object-fit-cover bg-white"
                                     loading="lazy"
                                     alt="<?php echo $image['alt']; ?>"
                                >
                            </div><!-- col -->
                        </div><!-- row -->
                    </div><!-- container -->
                </section><!-- text-media-blocked -->

            <?php elseif ($layout['acf_fc_layout'] == 'media_and_text_wide'): ?>
                <?php
                //acf fields data
                // structure > media (group)
                $media = $layout['structure']['media'];
                // structure > text (group)
                $text = $layout['structure']['text'];
                // structure > text > button (group)
                $buttons = $layout['structure']['text']['buttons']['button'];

                $image = $media['image'];
                $alignment = $media['alignment'];
                $above_header = $text['above_header'];
                $header = $text['header'];
                $text = $text['content'];
                $bg_curve = $layout['background_curve'];
                ?>

                <section class="text-media-wide pt-lg-3 pb-lg-1 py-xxxl-3 module-color--<?php echo $bg_curve; ?>">
                    <div class="container">
                        <div class="row align-items-center g-lg-3 position-relative">
                            <div class="col-lg-6 py-lg-3 py-xxxl-6">
                                <?php if (!empty($above_header)): ?>
                                    <h6 class="d-block"><?php echo $above_header; ?></h6>
                                <?php endif; ?>
                                <h2 class="h1">
                                    <span><?php echo $header; ?></span>
                                </h2>
                                <div class="mb-175">
                                    <?php echo $text; ?>
                                </div>
                                <?php if (!empty($buttons)): ?>
                                    <div class="column-content--button-set mb-1 mb-md-0">
                                        <?php foreach ($buttons as $button) :
                                            $target = $button['link']['target'] ?>
                                            <a href="<?php echo esc_url($button['link']['url']); ?>"
                                               class="btn <?php echo $button['style']; ?> mb-1"
                                                <?php if (!empty($target)): ?>
                                                    target="<?php echo $target ?>"
                                                <?php endif; ?>
                                            >
                                                <?php echo $button['link']['title']; ?>
                                            </a>
                                        <?php endforeach; ?>
                                    </div><!-- column-content--button-set -->
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-6 order-lg-<?php echo $alignment; ?> h-100">
                                <img src="<?php echo esc_url($image['url']); ?>"
                                     class="mb-2 mb-lg-0 h-100 img-fluid card-img-top object-fit-cover d-lg-none"
                                     loading="lazy"
                                     alt="<?php echo $image['alt']; ?>"
                                >
                                <div class="text-media-wide--img position-absolute d-none d-lg-block">
                                    <img src="<?php echo esc_url($image['url']); ?>"
                                         class="card-img-top object-fit-cover"
                                         loading="lazy"
                                         alt="<?php echo $image['alt']; ?>"
                                    >
                                </div><!-- position-absolute-->
                            </div><!-- col -->
                        </div><!-- row -->
                    </div><!-- container -->
                </section><!-- text-media-wide -->

            <?php elseif ($layout['acf_fc_layout'] == 'content_wide'): ?>

                <?php
                // structure > text (group)
                $text = $layout['structure']['text'];
                // structure > text > button (group)
                $buttons = $layout['structure']['text']['buttons']['button'];
                $above_header = $text['above_header'];
                $header = $text['header'];
                $text = $text['content'];
                $bgc = $layout['background_colour'];
                ?>
                <section class="content-wide pt-2 pt-xl-4 module-color--<?php echo $bgc; ?>">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <h2 class="h1">
                                    <?php if (!empty($above_header)): ?>
                                        <span class="h6 d-block"><?php echo $above_header; ?></span>
                                    <?php endif; ?>
                                    <?php echo $header; ?>
                                </h2>
                                <div class="lead mb-175">
                                    <?php echo $text; ?>
                                </div>
                                <?php if (!empty($buttons)): ?>
                                    <div class="column-content--button-set mb-1 mb-md-0">
                                        <?php foreach ($buttons as $button) :
                                            $target = $button['link']['target'] ?>
                                            <a href="<?php echo esc_url($button['link']['url']); ?>"
                                               class="btn <?php echo $button['style']; ?> mb-1"
                                                <?php if (!empty($target)): ?>
                                                    target="<?php echo $target ?>"
                                                <?php endif; ?>
                                            >
                                                <?php echo $button['link']['title']; ?>
                                            </a>
                                        <?php endforeach; ?>
                                    </div><!-- column-content--button-set -->
                                <?php endif; ?>
                            </div><!-- col -->
                        </div><!-- row -->
                    </div><!-- container -->
                </section><!-- content-wide -->

            <?php elseif ($layout['acf_fc_layout'] == 'content_two_thirds'): ?>
                <?php
                // dump($layout);
                // structure > text (group)
                $text = $layout['structure']['text'];
                // structure > text > button (group)
                $buttons = $layout['structure']['text']['buttons']['button'];
                $above_header = $text['above_header'];
                $header = $text['header'];
                $text = $text['content'];
                $bgc = $layout['structure']['background_colour']
                ?>
                <section class="content-two-thirds pt-1 module-color--<?php echo $bgc; ?>">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-xl-7 col-xxl-6">
                                <h2 class="h1">
                                    <?php if (!empty($above_header)): ?>
                                        <span class="h6 d-block"><?php echo $above_header; ?></span>
                                    <?php endif; ?>
                                    <?php echo $header; ?>
                                </h2>
                                <div class="lead mb-175">
                                    <?php echo $text; ?>
                                </div>
                                <?php if (!empty($buttons)): ?>
                                    <div class="column-content--button-set mb-1 mb-md-0">
                                        <?php foreach ($buttons as $button) :
                                            $target = $button['link']['target'] ?>
                                            <a href="<?php echo esc_url($button['link']['url']); ?>"
                                               class="btn <?php echo $button['style']; ?> mb-1"
                                                <?php if (!empty($target)): ?>
                                                    target="<?php echo $target ?>"
                                                <?php endif; ?>
                                            >
                                                <?php echo $button['link']['title']; ?>
                                            </a>
                                        <?php endforeach; ?>
                                    </div><!-- column-content--button-set -->
                                <?php endif; ?>
                            </div><!-- col -->
                        </div><!-- row -->
                    </div><!-- container -->
                </section><!-- content-two-thirds -->


            <?php elseif ($layout['acf_fc_layout'] == 'cards'): ?>
                <?php
                // dump($layout);
                $cards_index = $layout['cards']['card'];
                $bgc = $layout['background_colour'];
                ?>
                <section class="cards-with-icons py-1 pt-lg-2 module-color--<?php echo $bgc; ?>">
                    <div class="container">
                        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 gx-lg-2">
                            <?php foreach ($cards_index as $card):
                                //get the array item in the indexed array
                                $button_cta_assoc = $card['button_cta'];
                                ?>
                                <div class="col mb-1">
                                    <div class="card h-100 rounded bg-white bg-opacity-50 pb-50 pt-150 border-0">
                                        <img src="<?php echo esc_url($card['icon']['url']); ?>"
                                             class="mb-150 img-fluid card-img-top object-fit-cover rounded-circle bg-white"
                                             alt="<?php echo $card['icon']['title'] ?>">
                                        <div class="card-body px-xl-2 py-0 text-center">
                                            <h3 class="text-dark card-title mb-150"><?php echo $card['card_title']; ?></h3>
                                        </div><!-- card-body-->
                                        <div class="card-footer border-0 text-center bg-transparent">
                                            <?php if (!empty($button_cta_assoc)):
                                                $target = $button_cta_assoc['target'];
                                                ?>
                                                <a href="<?php echo esc_url($button_cta_assoc['url']); ?>"
                                                   class="btn btn-secondary"
                                                    <?php if ($target):
                                                        echo 'target="' . $target . '"';
                                                    endif; ?>
                                                >
                                                    <?php echo $button_cta_assoc['title']; ?>
                                                </a>
                                            <?php endif; ?>
                                        </div><!-- card-footer -->
                                    </div><!-- card -->
                                </div><!-- col -->
                            <?php endforeach; ?>
                        </div><!-- row -->
                    </div><!-- container -->
                </section><!-- cards-with-icons-->

            <?php elseif ($layout['acf_fc_layout'] == 'logo_carousel'): ?>
                <?php
                $logos = $layout['logos'];
                $intro = $layout['section_intro_optional'];
                $outro = $layout['section_outro_optional'];
                ?>
                <div class="container py-150">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h2><?php echo $layout['section_title'];?></h2>
                            <?php if($intro):?>
                                <p class="mb-2"><?php echo $intro; ?></p>
                            <?php endif; ?>
                        </div><!-- col -->
                    </div><!-- row -->
                    <div class="owl-carousel owl-carousel-logos owl-theme">
                        <?php foreach ($logos as $logo):
                            $logo_link = $logo['link_optional'];
                            $logo_src = $logo['logo'];
                            ?>
                            <div class="item position-relative">
                                <?php if ($logo_link): ?>
                                <a href="<?php echo $logo_link;?>" target="_blank" class="d-block w-100 h-100 position-relative z-index-100">
                                    <?php endif; ?>
                                    <img src="<?php echo $logo_src['url'];?>" class="img-fluid object-fit-contain" alt="<?php echo $logo_src['alt'];?>"/>
                                    <div class="position-absolute h-100 block__tint-grey"></div>
                                    <?php if ($logo_link): ?>
                                </a>
                            <?php endif; ?>
                            </div><!-- item-->
                        <?php endforeach; ?>
                    </div><!-- owl -->
                    <?php if($outro):?>
                        <div class="row pt-2">
                            <div class="col-12 text-center">
                                <p><?php echo $outro; ?></p>
                            </div><!-- col -->
                        </div><!-- row -->
                    <?php endif; ?>
                </div><!-- container -->

            <?php elseif ($layout['acf_fc_layout'] == 'content_carded'): ?>
                <?php
                // dump($layout);
                $cards_index = $layout['cards_content']['card'];
                $bgc = $layout['background_colour'];
                ?>
                <section class="columned-media-and-text py-1 pt-lg-2 module-color--<?php echo $bgc; ?>">
                    <div class="container">
                        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 gx-lg-2">
                            <?php foreach ($cards_index as $card):
                                //get the array item in the indexed array
                                $button_cta_assoc = $card['button_cta'];
                                ?>
                                <div class="col">
                                    <div class="card h-100 bg-transparent border border-0 mb-2">
                                        <img src="<?php echo esc_url($card['card_image']['url']); ?>"
                                             class="mb-1 img-fluid card-img-top object-fit-cover rounded bg-dark"
                                             alt="<?php echo $card['card_image']['title'] ?>">
                                        <div class="card-body p-0">
                                            <h5 class="p mb-150 card-title"><?php echo $card['card_title']; ?></h5>
                                            <p class="card-text mb-150"><?php echo $card['card_text']; ?></p>
                                            <?php if (!empty($button_cta_assoc)):
                                                $target = $button_cta_assoc['target'];
                                                ?>
                                                <a href="<?php echo esc_url($button_cta_assoc['url']); ?>"
                                                   class="btn btn-secondary"
                                                    <?php if ($target):
                                                        echo 'target="' . $target . '"';
                                                    endif; ?>
                                                >
                                                    <?php echo $button_cta_assoc['title']; ?>
                                                </a>
                                            <?php endif; ?>
                                        </div><!-- card-body-->
                                    </div><!-- card -->
                                </div><!-- col -->

                            <?php endforeach; ?>
                        </div><!-- row -->
                    </div><!-- container -->
                </section><!-- columned-media-and-text -->

            <?php elseif ($layout['acf_fc_layout'] == 'columned_content'): ?>
                <?php
                $column_index = $layout['columned_content']['column'];
                //dump($column_index);
                $bgc = $layout['background_colour'];
                ?>
                <section class="columned-white-media-and-text py-1 pt-lg-2 module-color--<?php echo $bgc; ?>">
                    <div class="container">
                        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 gx-lg-2">
                            <?php foreach ($column_index as $column): ?>
                                <div class="col">
                                    <div class="card h-100 bg-transparent border border-0 rounded-0 mb-2">
                                        <img src="<?php echo esc_url($column['column_image']['url']); ?>"
                                             class="mb-150 img-fluid rounded-0 card-img-top object-fit-cover bg-dark"
                                             alt="<?php echo $column['card_image']['title'] ?>">
                                        <div class="card-body p-0 pe-lg-1">
                                            <h5 class="h3 card-title text-white"><?php echo $column['column_title']; ?></h5>
                                            <div class="card-text mb-150">
                                                <?php echo $column['column_text']; ?>
                                            </div><!-- card-text -->
                                        </div><!-- card-body-->
                                    </div><!-- card -->
                                </div><!-- col -->
                            <?php endforeach; ?>
                        </div><!-- row -->
                    </div><!-- container -->
                </section><!-- columned-white-media-and-text-on-green -->

            <?php elseif ($layout['acf_fc_layout'] == 'slider_events'): ?>
                <?php
                $args = array(
                    'post_type' => 'event',
                    'posts_per_page' => 9, // Set to a specific number if you want to limit the number of products
                );

                $event_query = new WP_Query($args);

                if ($event_query->have_posts()) : ?>
                    <div class="container py-150">
                        <div class="row">
                            <div class="col-12">
                                <h2 class="text-center">What’s New - Events</h2>
                            </div>
                        </div>
                        <div class="owl-carousel owl-carousel-content owl-theme">

                            <?php while ($event_query->have_posts()) : $event_query->the_post();
                                $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); // Get the featured image URL
                                if (!$featured_img_url) {
                                    $logo_url = get_template_directory_uri() . '/images/placeholder-440by332.png'; // Get the logo URL
                                    $featured_img_url = $logo_url; // Set the logo URL as the default image
                                }
                                ?>
                                <div class="item position-relative" style="background: white url('<?php echo $featured_img_url; ?>') no-repeat; background-size: cover;">
                                    <div class="position-absolute h-100 block__tint-grey--darker"></div>
                                    <div class="post-content d-flex flex-column justify-content-end position-relative z-index-10 p-2">
                                        <h2 class="h3 card-title text-white"><?php the_title(); ?></h2>
                                        <div class="card-text text-white">
                                            <?php echo get_the_excerpt(); ?>
                                        </div>
                                        <a href="<?php echo get_permalink(); ?>" class="btn btn-secondary mt-150">Read more</a>
                                    </div>
                                </div><!-- item-->

                            <?php
                            endwhile; ?>
                        </div><!-- owl -->
                    </div><!-- container -->
                <?php endif;
                wp_reset_postdata();
                ?>

            <?php elseif ($layout['acf_fc_layout'] == 'slider_programs'): ?>
                <?php
                $args = array(
                    'post_type' => 'program',
                    'posts_per_page' => 9, // Set to a specific number if you want to limit the number of products
                );

                $event_query = new WP_Query($args);

                if ($event_query->have_posts()) : ?>
                    <div class="container py-150">
                        <div class="row">
                            <div class="col-12">
                                <h2 class="text-center">What’s New - Programs</h2>
                            </div>
                        </div>
                        <div class="owl-carousel owl-carousel-content owl-theme">

                            <?php while ($event_query->have_posts()) : $event_query->the_post();
                                $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); // Get the featured image URL
                                if (!$featured_img_url) {
                                    $logo_url = get_template_directory_uri() . '/images/placeholder-440by332.png'; // Get the logo URL
                                    $featured_img_url = $logo_url; // Set the logo URL as the default image
                                }
                                ?>
                                <div class="item position-relative" style="background: white url('<?php echo $featured_img_url; ?>') no-repeat; background-size: cover;">
                                    <div class="position-absolute h-100 block__tint-grey--darker"></div>
                                    <div class="post-content d-flex flex-column justify-content-end position-relative z-index-10 p-2">
                                        <h2 class="h3 card-title text-white"><?php the_title(); ?></h2>
                                        <div class="card-text text-white">
                                            <?php echo get_the_excerpt(); ?>
                                        </div>
                                        <a href="<?php echo get_permalink(); ?>" class="btn btn-secondary mt-150">Read more</a>
                                    </div>
                                </div><!-- item-->

                            <?php
                            endwhile; ?>
                        </div><!-- owl -->
                    </div><!-- container -->
                <?php endif;
                wp_reset_postdata();
                ?>


            <?php elseif ($layout['acf_fc_layout'] == 'forest_white_hills'): ?>
                <?php
                $bgc = $layout['background_colour'];
                ?>
                <section class="green-hills-with-sky module-color--<?php echo $bgc; ?> position-relative">
                    <div class="snowy-hills"></div><!-- green-hills -->
                </section>

            <?php elseif ($layout['acf_fc_layout'] == 'forest_green_hills'): ?>
                <?php
                $bgc = $layout['background_colour'];
                ?>
                <section class="green-hills-with-sky module-color--<?php echo $bgc; ?> position-relative">
                    <div class="green-hills"></div><!-- green-hills -->
                </section>

            <?php elseif ($layout['acf_fc_layout'] == 'white_hills'): ?>
                <?php
                $bgc = $layout['background_colour'];
                ?>
                <section class="snowy-hills-on-green module-color--<?php echo $bgc; ?> position-relative">
                    <div class="snowy-hills"></div><!-- green-hills -->
                </section>

            <?php elseif ($layout['acf_fc_layout'] == 'green_hills'): ?>
                <?php
                $bgc = $layout['background_colour'];
                ?>
                <section class="snowy-hills-on-green module-color--<?php echo $bgc; ?> position-relative">
                    <div class="green-hills"></div><!-- green-hills -->
                </section>

            <?php endif;
            $counter++;
        endforeach;
        wp_reset_postdata();
        ?>
    <?php endif;
endif; ?>
