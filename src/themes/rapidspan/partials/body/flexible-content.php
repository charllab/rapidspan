<?php
$body = get_field('body');
if ($body) :
    $layouts = $body['layout'];
    if ($layouts) : ?>
        <?php $counter = 0;
        foreach ($layouts as $layout) : ?>
            <?php if ($layout['acf_fc_layout'] == 'media_and_text'): ?>

                <?php
                $media = $layout['structure']['media']['image'];
                $content = $layout['structure']['content_block'];
                $buttons = $content['buttons'];
                $alignment = $layout['structure']['media']['alignment'];
                $video_url = $layout['has_video_link'];

                // Extract content block from structure
                $content_block = $layout['structure']['content_block'] ?? [];
                ?>

                <section class="text-media-wide">
                    <div class="container">
                        <div class="row justify-content-center align-items-center position-relative">
                            <div class="col-lg-6 mt-lg-0">
                                <div class="py-50 py-lg-2 img-is-<?php echo $alignment; ?>">
                                    <?php
                                    // Set the variables you need in the partial
                                    set_query_var('content_block', $content_block);
                                    get_template_part('partials/modules/content-block');
                                    ?>
                                </div>
                            </div>
                            <div class="col-lg-6 order-lg-<?php echo $alignment; ?> h-100">
                                <div
                                    class="mb-2 mb-lg-0 position-relative z-index-1 d-lg-none <?php echo $js = (!empty($video_url)) ? 'js-video' : ''; ?>">
                                    <?php echo $video_dsk_start = (!empty($video_url)) ? '<a href="' . $video_url . '">' : '' ?>
                                    <img src="<?php echo $media['url']; ?>"
                                         alt=" "
                                         class="h-100 img-fluid card-img-top object-fit-cover position-relative z-index--1"
                                         loading="lazy"
                                    >
                                    <?php if (!empty($video_url)): ?>
                                        <div class="cta position-absolute z-index-2 text-white text-uppercase">
                                            <div class="d-flex flex-column justify-content-center align-items-center">
                                                <div class="mb-50">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="157" height="157"
                                                         viewBox="0 0 157 157" aria-hidden="true">
                                                        <g id="Group_163" data-name="Group 163"
                                                           transform="translate(-1335 -2910)">
                                                            <g id="Ellipse_27" data-name="Ellipse 27"
                                                               transform="translate(1335 2910)" fill="none"
                                                               stroke="#fff" stroke-width="11">
                                                                <circle cx="78.5" cy="78.5" r="78.5" stroke="none"/>
                                                                <circle cx="78.5" cy="78.5" r="73" fill="none"/>
                                                            </g>
                                                            <g id="Polygon_15" data-name="Polygon 15"
                                                               transform="translate(1464.139 2944.954) rotate(90)"
                                                               fill="#fff">
                                                                <path
                                                                    d="M 73.42989349365234 72.04489135742188 L 13.76300811767578 72.04489135742188 C 11.9453649520874 72.04489135742188 11.0413646697998 70.82727813720703 10.73707962036133 70.30377960205078 C 10.43277931213379 69.78028106689453 9.822136878967285 68.39215087890625 10.72170829772949 66.81270599365234 L 40.55513763427734 14.43236255645752 C 41.46389389038086 12.83680629730225 42.9847526550293 12.66454887390137 43.59645080566406 12.66454887390137 C 44.20813751220703 12.66454887390137 45.7289924621582 12.8367919921875 46.63773727416992 14.43234825134277 L 76.47119140625 66.81270599365234 C 77.37076568603516 68.39215087890625 76.76012420654297 69.78028106689453 76.45582580566406 70.30377960205078 C 76.15153503417969 70.82727813720703 75.24753570556641 72.04489135742188 73.42989349365234 72.04489135742188 Z"
                                                                    stroke="none"/>
                                                                <path
                                                                    d="M 43.59644317626953 18.18510437011719 L 15.48339080810547 67.54488372802734 L 71.70949554443359 67.54488372802734 L 43.59644317626953 18.18510437011719 M 43.59643936157227 8.164543151855469 C 46.30508041381836 8.164543151855469 49.01372146606445 9.511444091796875 50.54799270629883 12.20524597167969 L 80.38143157958984 64.58560180664062 C 83.41899108886719 69.91880035400391 79.56745147705078 76.54488372802734 73.42989349365234 76.54488372802734 L 13.76300811767578 76.54488372802734 C 7.625450134277344 76.54488372802734 3.773910522460938 69.91880035400391 6.811447143554688 64.58560180664062 L 36.64488983154297 12.20524597167969 C 38.17916107177734 9.511444091796875 40.88780212402344 8.164543151855469 43.59643936157227 8.164543151855469 Z"
                                                                    stroke="none" fill="#fff"/>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                </div>
                                                <p class="mb-0">Watch <span
                                                        class="sr-only d-inline"><?php echo esc_html($content_block['header']); ?></span>Video
                                                </p>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php echo $video_mbl_end = (!empty($video_url)) ? '</a>' : '' ?>
                                </div>
                                <div class="text-media-wide--img position-absolute d-none d-lg-block">
                                    <div
                                        class="mb-2 mb-lg-0 position-relative z-index-1 <?php echo $js = (!empty($video_url)) ? 'js-video' : '' ?>">
                                        <?php echo $video_dsk_start = (!empty($video_url)) ? '<a href="' . $video_url . '">' : '' ?>
                                        <img src="<?php echo $media['url']; ?>"
                                             class="card-img-top object-fit-cover"
                                             loading="lazy"
                                             alt=" "
                                        >
                                        <?php if (!empty($video_url)): ?>
                                            <div class="cta position-absolute z-index-2 text-white text-uppercase">
                                                <div
                                                    class="d-flex flex-column justify-content-center align-items-center">
                                                    <div class="mb-50">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="157" height="157"
                                                             viewBox="0 0 157 157" aria-hidden="true">
                                                            <g id="Group_163" data-name="Group 163"
                                                               transform="translate(-1335 -2910)">
                                                                <g id="Ellipse_27" data-name="Ellipse 27"
                                                                   transform="translate(1335 2910)" fill="none"
                                                                   stroke="#fff" stroke-width="11">
                                                                    <circle cx="78.5" cy="78.5" r="78.5" stroke="none"/>
                                                                    <circle cx="78.5" cy="78.5" r="73" fill="none"/>
                                                                </g>
                                                                <g id="Polygon_15" data-name="Polygon 15"
                                                                   transform="translate(1464.139 2944.954) rotate(90)"
                                                                   fill="#fff">
                                                                    <path
                                                                        d="M 73.42989349365234 72.04489135742188 L 13.76300811767578 72.04489135742188 C 11.9453649520874 72.04489135742188 11.0413646697998 70.82727813720703 10.73707962036133 70.30377960205078 C 10.43277931213379 69.78028106689453 9.822136878967285 68.39215087890625 10.72170829772949 66.81270599365234 L 40.55513763427734 14.43236255645752 C 41.46389389038086 12.83680629730225 42.9847526550293 12.66454887390137 43.59645080566406 12.66454887390137 C 44.20813751220703 12.66454887390137 45.7289924621582 12.8367919921875 46.63773727416992 14.43234825134277 L 76.47119140625 66.81270599365234 C 77.37076568603516 68.39215087890625 76.76012420654297 69.78028106689453 76.45582580566406 70.30377960205078 C 76.15153503417969 70.82727813720703 75.24753570556641 72.04489135742188 73.42989349365234 72.04489135742188 Z"
                                                                        stroke="none"/>
                                                                    <path
                                                                        d="M 43.59644317626953 18.18510437011719 L 15.48339080810547 67.54488372802734 L 71.70949554443359 67.54488372802734 L 43.59644317626953 18.18510437011719 M 43.59643936157227 8.164543151855469 C 46.30508041381836 8.164543151855469 49.01372146606445 9.511444091796875 50.54799270629883 12.20524597167969 L 80.38143157958984 64.58560180664062 C 83.41899108886719 69.91880035400391 79.56745147705078 76.54488372802734 73.42989349365234 76.54488372802734 L 13.76300811767578 76.54488372802734 C 7.625450134277344 76.54488372802734 3.773910522460938 69.91880035400391 6.811447143554688 64.58560180664062 L 36.64488983154297 12.20524597167969 C 38.17916107177734 9.511444091796875 40.88780212402344 8.164543151855469 43.59643936157227 8.164543151855469 Z"
                                                                        stroke="none" fill="#fff"/>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                    <p class="mb-0">Watch <span
                                                            class="sr-only d-inline"><?php echo esc_html($content_block['header']); ?></span>Video
                                                    </p>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <?php echo $video_dsk_end = (!empty($video_url)) ? '</a>' : '' ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            <?php elseif ($layout['acf_fc_layout'] == 'constraint_content_header_follower'): ?>

                <?php
                $spacing = $layout['spacing'] ?? [];
                $py = in_array('py-5', $spacing) ? 'py-5' : '';
                $my = in_array('my-5', $spacing) ? 'my-5' : '';

                // Initialize classes array
                $classes = ['full-width-content', 'wide-container ', 'full-width-content-pull-for-gradient', 'pb-4', 'position-relative', 'z-index--1'];

                // Convert classes array to string
                $classes_string = implode(' ', $classes);

                // Extract content block from structure
                $content_block = $layout['structure']['content_block'] ?? [];
                ?>
                <section class="<?php echo esc_attr($classes_string); ?>">
                    <img src="https://unsplash.it/1920/1024?random" alt=" "
                         class="full-width-content--dark--bg position-absolute z-index-1 d-none">
                    <div class="block__img-overlay position-absolute z-index-1"></div>
                    <div class="container position-relative z-index-2 pt-4"
                         data-aos="fade-up"
                         data-aos-offset="120"
                         data-aos-delay="0"
                         data-aos-duration="1000"
                         data-aos-easing="ease"
                         data-aos-mirror="false"
                         data-aos-once="false"
                    >
                        <div class="row justify-content-center">
                            <div class="col-md-10 text-center">
                                <?php
                                // Set the variables you need in the partial
                                set_query_var('content_block', $content_block);
                                get_template_part('partials/modules/content-block');
                                ?>
                            </div>
                        </div>
                    </div>
                </section>

            <?php elseif ($layout['acf_fc_layout'] == 'page_breaker_image'): ?>
                <?php
                $spacing = $layout['spacing'] ?? [];
                $py = in_array('py-5', $spacing) ? 'py-5' : '';
                $my = in_array('my-5', $spacing) ? 'my-5' : '';

                // Initialize classes array
                $classes = [''];
                // Conditional classes
                if (!empty($background_image)) {
                    $classes[] = 'full-width-content--dark';
                }
                if (!empty($py)) {
                    $classes[] = 'py-5';
                }
                if (!empty($my)) {
                    $classes[] = 'my-5';
                }

                // Convert classes array to string
                $classes_string = implode(' ', $classes);
                $breaker_img = $layout['image'] ?? [];
                ?>
                <?php if (!empty($breaker_img)): ?>
                    <section class="<?php echo esc_attr($classes_string); ?>"
                             data-aos="fade-up"
                             data-aos-offset="120"
                             data-aos-delay="0"
                             data-aos-duration="1000"
                             data-aos-easing="ease"
                             data-aos-mirror="false"
                             data-aos-once="false"
                    >
                        <img src="<?php echo $breaker_img['url']; ?>" alt="<?php echo $breaker_img['alt']; ?>"
                             class="page-breaker-img img-fluid" aria-hidden="true">
                    </section>
                <?php endif; ?>

            <?php elseif ($layout['acf_fc_layout'] == 'partner_logos'): ?>
                <?php
                $spacing = $layout['spacing'] ?? [];
                $py = in_array('py-5', $spacing) ? 'py-5' : '';
                $my = in_array('my-5', $spacing) ? 'my-5' : '';

                // Initialize classes array
                $classes = ['my-2'];
                // Conditional classes
                if (!empty($background_image)) {
                    $classes[] = 'full-width-content--dark';
                }
                if (!empty($py)) {
                    $classes[] = 'py-5';
                }
                if (!empty($my)) {
                    $classes[] = 'my-5';
                }

                // Convert classes array to string
                $classes_string = implode(' ', $classes);

                $heading_section = $layout['heading_section'];
                $logos = $layout['logos'];
                ?>

                <section class="<?php echo esc_attr($classes_string); ?>">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-10 text-center">
                                <?php if (!empty($heading_section)): ?>
                                    <h2 class="h3 text-uppercase mb-50"><?php echo $heading_section['header']; ?></h2>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <!--repeater start-->
                            <?php
                            $delay = 50; // starting delay value
                            foreach ($logos as $logo):
                                $logo_img = $logo['logo'] ?? [];
                                $logo_link = $logo['affiliate_link'] ?? [];
                                ?>
                                <div class="col-md-3 text-center"
                                     data-aos="zoom-in-up"
                                     data-aos-offset="120"
                                     data-aos-delay="<?php echo $delay; ?>"
                                     data-aos-duration="800"
                                     data-aos-easing="ease"
                                     data-aos-mirror="false"
                                     data-aos-once="false"
                                >
                                    <?php echo $logo_link_start = (!empty($logo_link)) ? '<a href="' . $logo_link['url'] . '" target="' . $logo_link['target'] . '" title="' . $logo_link['title'] . '" >' : ''; ?>
                                    <img src="<?php echo $logo_img['url']; ?>" alt="<?php echo $logo_img['alt']; ?>"
                                         class="logo-image img-fluid">
                                    <?php echo $logo_link_end = (!empty($logo_link)) ? '</a>' : ''; ?>
                                </div>
                                <?php
                                $delay += 150; // increment the delay value
                            endforeach; ?>
                            <!--repeater end-->
                        </div>
                    </div>
                </section>


            <?php elseif ($layout['acf_fc_layout'] == 'wide_image_with_block_title'): ?>

                <?php
                $wide_image = $layout['image'];
                $wide_title = $layout['title'];
                $wide_link = $layout['link'];
                ?>
                <section class="crossing-the-bridge-section position-relative z-index-1 my-4">
                    <div class="crossing-the-bridge-top">
                        <img src="<?php echo $wide_image['url']; ?>" alt="<?php echo $wide_image['alt']; ?>"
                             class="img-fluid crossing-the-bridge-img object-fit-cover z-index--1" aria-hidden="true">
                        <div class="block__img-overlay position-absolute z-index-1"></div>
                    </div>

                    <div class="container crossing-the-bridge-container py-2 position-relative z-index-2"
                         data-aos="fade-up"
                         data-aos-offset="120"
                         data-aos-delay="0"
                         data-aos-duration="1000"
                         data-aos-easing="ease"
                         data-aos-mirror="false"
                         data-aos-once="false"
                    >
                        <div class="row justify-content-center">
                            <div class="col-md-10 text-center text-white position-relative z-index-2">
                                <h2 class="text-uppercase"><?php echo $wide_title; ?></h2>
                                <a href="<?php echo $wide_link['url']; ?>"
                                   class="btn btn-light"><?php echo $wide_link['title']; ?></a>
                            </div>
                        </div>
                        <div class="block__img-overlay crossing-the-bridge-overlay position-absolute z-index-1"></div>
                    </div>
                </section>

            <?php elseif ($layout['acf_fc_layout'] == 'content_block'): ?>

                <?php
                $background_image = $layout['background_image'] ?? null;
                $content_width = $layout['content_width'] ?? null;
                $spacing = $layout['spacing'] ?? [];
                $py = in_array('py-5', $spacing) ? 'py-5' : '';
                $my = in_array('my-5', $spacing) ? 'my-5' : '';

                // Initialize classes array
                $classes = ['full-width-content', 'position-relative', 'z-index--1'];

                // Conditional classes
                if (!empty($background_image)) {
                    $classes[] = 'full-width-content--dark';
                }
                if (!empty($py)) {
                    $classes[] = 'py-5';
                }
                if (!empty($my)) {
                    $classes[] = 'my-5';
                }

                // Convert classes array to string
                $classes_string = implode(' ', $classes);

                // Extract content block from structure
                $content_block = $layout['structure']['content_block'] ?? [];
                ?>

                <section class="<?php echo esc_attr($classes_string); ?>"
                         data-aos="fade-up"
                         data-aos-offset="120"
                         data-aos-delay="0"
                         data-aos-duration="1000"
                         data-aos-easing="ease"
                         data-aos-mirror="false"
                         data-aos-once="false"
                >
                    <?php if (!empty($background_image)): ?>
                        <img src="<?php echo esc_url($background_image['url']); ?>"
                             alt="<?php echo esc_attr($background_image['url']); ?>"
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
                $py = in_array('py-5', $spacing) ? 'py-5' : '';
                $my = in_array('my-5', $spacing) ? 'my-5' : '';

                // Initialize classes array
                $classes = ['full-width-content', 'position-relative', 'z-index--1'];

                // Conditional classes
                if (!empty($background_image)) {
                    $classes[] = 'full-width-content--dark';
                }
                if (!empty($py)) {
                    $classes[] = 'py-5';
                }
                if (!empty($my)) {
                    $classes[] = 'my-5';
                }

                // Convert classes array to string
                $classes_string = implode(' ', $classes);

                // Extract left and right content blocks from the layout
                $column_left = $layout['columned_content']['structure']['column_left'] ?? [];
                $column_right = $layout['columned_content']['structure']['column_right'] ?? [];
                ?>

                <section class="<?php echo esc_attr($classes_string); ?>">
                    <?php if (!empty($background_image)): ?>
                        <img src="<?php echo esc_url($background_image['url']); ?>"
                             alt="<?php echo esc_attr($background_image['url']); ?>"
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

            <?php elseif ($layout['acf_fc_layout'] == 'columned_stack'): ?>

                <?php
                $background_image = $layout['background_image'] ?? null;
                $content_width = $layout['content_width'] ?? null;
                $spacing = $layout['spacing'] ?? [];
                $py = in_array('py-5', $spacing) ? 'py-5' : '';
                $my = in_array('my-5', $spacing) ? 'my-5' : '';

                // Initialize classes array
                $classes = ['full-width-content', 'position-relative', 'z-index--1'];

                // Conditional classes
                if (!empty($background_image)) {
                    $classes[] = 'full-width-content--dark';
                }
                if (!empty($py)) {
                    $classes[] = 'py-5';
                }
                if (!empty($my)) {
                    $classes[] = 'my-5';
                }

                // Convert classes array to string
                $classes_string = implode(' ', $classes);

                // Extract content block from structure
                $content_block = $layout['content_block'] ?? [];
                // Extract left and right content blocks from the layout
                $column_left = $layout['columned_content']['structure']['column_left'] ?? [];
                $column_right = $layout['columned_content']['structure']['column_right'] ?? [];
                ?>

                <section class="<?php echo esc_attr($classes_string); ?>">
                    <?php if (!empty($background_image)): ?>
                        <img src="<?php echo esc_url($background_image['url']); ?>"
                             alt="<?php echo esc_attr($background_image['url']); ?>"
                             class="full-width-content--dark--bg position-absolute z-index-1"
                             aria-hidden="true">
                        <div class="block__img-overlay position-absolute z-index-1" aria-hidden="true"></div>
                    <?php endif; ?>
                    <div class="container position-relative z-index-2">
                        <div class="row justify-content-center">
                            <div class="col-md-10 <?php echo esc_attr($content_width); ?> text-center"
                                 data-aos="fade-up"
                                 data-aos-offset="120"
                                 data-aos-delay="0"
                                 data-aos-duration="1000"
                                 data-aos-easing="ease"
                                 data-aos-mirror="false"
                                 data-aos-once="false"
                            >

                                <?php
                                // Set the variables you need in the partial
                                set_query_var('content_block', $content_block);
                                get_template_part('partials/modules/content-block');
                                ?>

                            </div><!--col-->
                        </div><!--row-->
                        <div class="row justify-content-around stacked">
                            <div class="col-xl-5 col-xxxl-4 text-center"
                                 data-aos="fade-up"
                                 data-aos-offset="120"
                                 data-aos-delay="150"
                                 data-aos-duration="1000"
                                 data-aos-easing="ease"
                                 data-aos-mirror="false"
                                 data-aos-once="false"
                            >
                                <?php
                                // Set the variables you need in the partial for the left column
                                set_query_var('content_block', $column_left['content_block']);
                                get_template_part('partials/modules/content-block');
                                ?>
                            </div>
                            <div class="col-xl-5 col-xxxl-4 text-center"
                                 data-aos="fade-up"
                                 data-aos-offset="120"
                                 data-aos-delay="300"
                                 data-aos-duration="1000"
                                 data-aos-easing="ease"
                                 data-aos-mirror="false"
                                 data-aos-once="false"
                            >
                                <?php
                                // Set the variables you need in the partial for the right column
                                set_query_var('content_block', $column_right['content_block']);
                                get_template_part('partials/modules/content-block');
                                ?>
                            </div>
                        </div>
                    </div><!--container-->
                </section>

            <?php elseif ($layout['acf_fc_layout'] == 'gallery'): ?>

                <?php
                $spacing = $layout['spacing'] ?? [];
                $py = in_array('py-5', $spacing) ? 'py-5' : '';
                $my = in_array('my-5', $spacing) ? 'my-5' : '';
                // Initialize classes array
                $classes = ['gallery-section'];

                if (!empty($py)) {
                    $classes[] = 'py-5';
                }
                if (!empty($my)) {
                    $classes[] = 'my-5';
                }

                // Convert classes array to string
                $classes_string = implode(' ', $classes);

                $items = $layout['items'];
                // Extract content block from structure
                $content_block = $layout['content_block'] ?? [];
                $bgcolour = $layout['background_colour'] ?? [];
                $section_buttons = $layout['buttons'] ?? [];

                ?>

                <section
                    class="<?php echo esc_attr($classes_string); ?><?php echo $bgc = (!empty($bgcolour)) ? ' bg-soft' : ''; ?>">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-10 text-center pb-2">
                                <?php
                                // Set the variables you need in the partial
                                set_query_var('content_block', $content_block);
                                get_template_part('partials/modules/content-block');
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="container"
                         data-aos="fade-up"
                         data-aos-offset="120"
                         data-aos-delay="0"
                         data-aos-duration="1000"
                         data-aos-easing="ease"
                         data-aos-mirror="false"
                         data-aos-once="false"
                    >
                        <ul class="gallery-list d-flex flex-row list-inline list-unstyled">
                            <?php foreach ($items as $item):
                                $galleryimg = $item['gallery_image'];
                                $gallery_video_url = $item['has_video_link'];
                                $galleryimgurl = $galleryimg['url'];
                                ?>
                                <li class="list-inline-item list-width-item<?php echo $js = (!empty($gallery_video_url)) ? ' js-video list-width-item-wide is-video' : ' js-gallery'; ?>">
                                    <a
                                        href="<?php echo $js = (!empty($gallery_video_url)) ? $gallery_video_url : $galleryimgurl; ?>"
                                        class="<?php echo $js = (!empty($gallery_video_url)) ? 'js-video' : 'js-gallery-item'; ?>">
                                        <img
                                            src="<?php echo $galleryimg['url']; ?>"
                                            alt="<?php echo $galleryimg['alt']; ?>"
                                            class="img-fluid  object-fit-cover">
                                        <div class="cta position-absolute z-index-2 text-white">
                                            <div class="d-flex flex-column justify-content-center align-items-center">
                                                <div class="mb-50">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="157" height="157"
                                                         viewBox="0 0 157 157" aria-hidden="true">
                                                        <g id="Group_163" data-name="Group 163"
                                                           transform="translate(-1335 -2910)">
                                                            <g id="Ellipse_27" data-name="Ellipse 27"
                                                               transform="translate(1335 2910)" fill="none"
                                                               stroke="#fff" stroke-width="11">
                                                                <circle cx="78.5" cy="78.5" r="78.5" stroke="none"/>
                                                                <circle cx="78.5" cy="78.5" r="73" fill="none"/>
                                                            </g>
                                                            <g id="Polygon_15" data-name="Polygon 15"
                                                               transform="translate(1464.139 2944.954) rotate(90)"
                                                               fill="#fff">
                                                                <path
                                                                    d="M 73.42989349365234 72.04489135742188 L 13.76300811767578 72.04489135742188 C 11.9453649520874 72.04489135742188 11.0413646697998 70.82727813720703 10.73707962036133 70.30377960205078 C 10.43277931213379 69.78028106689453 9.822136878967285 68.39215087890625 10.72170829772949 66.81270599365234 L 40.55513763427734 14.43236255645752 C 41.46389389038086 12.83680629730225 42.9847526550293 12.66454887390137 43.59645080566406 12.66454887390137 C 44.20813751220703 12.66454887390137 45.7289924621582 12.8367919921875 46.63773727416992 14.43234825134277 L 76.47119140625 66.81270599365234 C 77.37076568603516 68.39215087890625 76.76012420654297 69.78028106689453 76.45582580566406 70.30377960205078 C 76.15153503417969 70.82727813720703 75.24753570556641 72.04489135742188 73.42989349365234 72.04489135742188 Z"
                                                                    stroke="none"/>
                                                                <path
                                                                    d="M 43.59644317626953 18.18510437011719 L 15.48339080810547 67.54488372802734 L 71.70949554443359 67.54488372802734 L 43.59644317626953 18.18510437011719 M 43.59643936157227 8.164543151855469 C 46.30508041381836 8.164543151855469 49.01372146606445 9.511444091796875 50.54799270629883 12.20524597167969 L 80.38143157958984 64.58560180664062 C 83.41899108886719 69.91880035400391 79.56745147705078 76.54488372802734 73.42989349365234 76.54488372802734 L 13.76300811767578 76.54488372802734 C 7.625450134277344 76.54488372802734 3.773910522460938 69.91880035400391 6.811447143554688 64.58560180664062 L 36.64488983154297 12.20524597167969 C 38.17916107177734 9.511444091796875 40.88780212402344 8.164543151855469 43.59643936157227 8.164543151855469 Z"
                                                                    stroke="none" fill="#fff"/>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                </div>
                                                <p class="mb-0">Watch <span
                                                        class="sr-only d-inline"><?php echo esc_html($content_block['header']); ?></span>Video
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <?php if (!empty($section_buttons)):
                            $buttons = $section_buttons['button'];
                            ?>
                            <div class="row justify-content-center">
                                <div class="col text-center">
                                    <div class="buttons">
                                        <?php foreach ($buttons as $button): ?>
                                            <?php
                                            $target = $button['link']['target'] ?? '';
                                            ?>
                                            <a href="<?php echo esc_url($button['link']['url']); ?>"
                                               class="btn <?php echo esc_attr($button['style']); ?> mb-0"
                                                <?php if (!empty($target)): ?>
                                                    target="<?php echo esc_attr($target); ?>"
                                                <?php endif; ?>
                                            >
                                                <?php echo esc_html($button['link']['title']); ?>
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </section>

            <?php elseif ($layout['acf_fc_layout'] == 'cards'): ?>

                <?php
                $spacing = $layout['spacing'] ?? [];
                $py = in_array('py-5', $spacing) ? 'py-5' : '';
                $my = in_array('my-5', $spacing) ? 'my-5' : '';

                // Initialize classes array
                $classes = ['three-col-container py-3'];

                // Conditional classes
                if (!empty($background_image)) {
                    $classes[] = '';
                }
                if (!empty($py)) {
                    $classes[] = 'py-5';
                }
                if (!empty($my)) {
                    $classes[] = 'my-5';
                }
                $classes_string = implode(' ', $classes);

                $heading_section = $layout['heading_section'];
                $header_decorative = $heading_section['header_decorative'];
                $cards = $layout['cards']['card'];
                ?>


                <section class="<?php echo esc_attr($classes_string); ?>">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-10 text-center">
                                <?php if (!empty($heading_section)): ?>
                                    <h2 class="h1 mb-2"><?php echo $heading_section['header']; ?></h2>
                                    <?php if (!empty($header_decorative)): ?>
                                        <div class="header-decorative justify-content-center mb-2 mt-150">
                                            <span></span>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <!--repeater start-->
                            <?php $carddelay = 50; // starting delay value
                            foreach ($cards as $card):
                                $card_icon = $card['icon'];
                                $card_title = $card['card_title'];
                                $card_link = $card['button_cta'];
                                ?>
                                <div class="col-lg-4 border-right-target text-center"
                                     data-aos="zoom-in-up"
                                     data-aos-offset="120"
                                     data-aos-delay="<?php echo $carddelay; ?>"
                                     data-aos-duration="800"
                                     data-aos-easing="ease"
                                     data-aos-mirror="false"
                                     data-aos-once="false"
                                >
                                    <div class="d-flex justify-content-center align-items-center mb-50">
                                        <div class="w-25 text-right">
                                            <img src="<?php echo $card_icon['url']; ?>"
                                                 alt="<?php echo $card_icon['alt']; ?>"
                                                 class="img-fluid d-block ms-auto me-50" aria-hidden="true">
                                        </div>
                                        <div class="w-25 text-start">
                                            <h3 class="mb-0 ms-50 pe-lg-250"><?php echo $card_title; ?></h3>
                                        </div>
                                    </div>
                                    <a href="<?php echo $card_link['url']; ?>" class="btn btn-secondary mb-2 mb-lg-1">Learn
                                        More<span
                                            class="sr-only">about <?php echo $card_link['title']; ?></span></a>
                                </div>
                                <?php
                                $carddelay += 150; // increment the delay value
                                endforeach; ?>
                            <!--repeater end-->
                        </div>
                    </div>
                </section>

            <?php elseif ($layout['acf_fc_layout'] == 'portfolio_accordion'): ?>
                <?php
                $spacing = $layout['spacing'] ?? [];
                $py = in_array('py-5', $spacing) ? 'py-5' : '';
                $my = in_array('my-5', $spacing) ? 'my-5' : '';

                // Initialize classes array
                $classes = ['py-4'];

                // Conditional classes
                if (!empty($background_image)) {
                    $classes[] = 'py-3';
                }
                if (!empty($py)) {
                    $classes[] = 'py-5';
                }
                if (!empty($my)) {
                    $classes[] = 'my-5';
                }
                $classes_string = implode(' ', $classes);

                $heading_section = $layout['heading_section'];
                $header_decorative = $heading_section['header_decorative'];
                $portfolio_accordion_tabs = $layout['portfolio_accordion']['accordion_block'];
                ?>

                <section class="<?php echo esc_attr($classes_string); ?>">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-10">

                                <?php if (!empty($heading_section)): ?>
                                    <div class="text-center">
                                        <h2 class="h1"><?php echo $heading_section['header']; ?></h2>
                                        <?php if (!empty($header_decorative)): ?>
                                            <div class="header-decorative justify-content-center mb-2 mt-150">
                                                <span></span>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>

                                <div class="accordion" id="accordionExample">
                                    <!--start accordion-item tab repeater-->
                                    <?php
                                    $tabcounter = 0;
                                    foreach ($portfolio_accordion_tabs as $portfolio_accordion_tab):?>
                                        <div class="accordion-item border-0 mb-2">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button rounded-0" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapse--<?php echo $tabcounter; ?>"
                                                        aria-expanded="true"
                                                        aria-controls="collapse--<?php echo $tabcounter; ?>">
                                                    <?php echo $portfolio_accordion_tab['project_portfolio_name']; ?>
                                                </button>
                                            </h2>
                                            <div id="collapse--<?php echo $tabcounter; ?>"
                                                 class="accordion-collapse collapse <?php echo $show = ($tabcounter == 0) ? 'show' : ''; ?>"
                                                 data-bs-parent="#accordionExample">
                                                <ul class="d-flex flex-row list-inline list-unstyled project-list py-1">
                                                    <!--start project repeater-->
                                                    <?php
                                                    $portfolio_accordion_tab_project = $portfolio_accordion_tab['projects'];
                                                    foreach ($portfolio_accordion_tab_project as $portfolio_item):
                                                        $portfolio_image = $portfolio_item['project_image'];
                                                        $portfolio_link = $portfolio_item['project_link'];
                                                        ?>
                                                        <li class="list-inline-item list-item-project">
                                                            <a href="<?php echo $portfolio_link['url']; ?>"
                                                               class="position-relative"
                                                               title="Visit the <?php echo $portfolio_item['project_title'] . ' page.'; ?>">
                                                                <img
                                                                    src="<?php echo $portfolio_image['url']; ?>"
                                                                    alt="<?php echo $portfolio_image['alt']; ?>"
                                                                    class="img-fluid d-block object-fit-cover"
                                                                    aria-hidden="true">
                                                                <div
                                                                    class="list-item-project-title position-absolute text-center p-75">
                                                                    <div class="title-wrapper position-relative">
                                                                        <img
                                                                            src="<?php bloginfo('template_url'); ?>/images/ico-bridge.png"
                                                                            alt=" "
                                                                            class="project-bride-icon img-fluid mx-auto"
                                                                            aria-hidden="true">
                                                                        <h3 class="text-uppercase text-white mb-0">
                                                                            <?php echo $portfolio_item['project_title']; ?>
                                                                        </h3>
                                                                    </div>

                                                                </div>
                                                            </a>
                                                        </li>
                                                    <?php endforeach; ?>
                                                    <!--end project repeat-->
                                                </ul>
                                            </div>
                                        </div>
                                        <?php $tabcounter++;
                                    endforeach; ?>
                                    <!--end accordion-item tab-->
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            <?php elseif ($layout['acf_fc_layout'] == 'testimonial_slider'): ?>

                <?php
                $spacing = $layout['spacing'] ?? [];
                $py = in_array('py-5', $spacing) ? 'py-5' : '';
                $my = in_array('my-5', $spacing) ? 'my-5' : '';

                // Initialize classes array
                $classes = ['py-4'];

                // Conditional classes
                if (!empty($background_image)) {
                    $classes[] = 'full-width-content--dark';
                }
                if (!empty($py)) {
                    $classes[] = 'py-5';
                }
                if (!empty($my)) {
                    $classes[] = 'my-5';
                }
                $classes_string = implode(' ', $classes);

                $sliders = $layout['slider_items'];
                $heading_section = $layout['heading_section'];
                $header_decorative = $heading_section['header_decorative'];
                ?>

                <section class="<?php echo esc_attr($classes_string); ?>"
                         data-aos-offset="120"
                         data-aos-delay="0"
                         data-aos-duration="1000"
                         data-aos-easing="ease"
                         data-aos-mirror="false"
                         data-aos-once="false"
                >
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-10 text-center">
                                <?php if (!empty($heading_section)): ?>
                                    <h2><?php echo $heading_section['header']; ?></h2>
                                    <?php if (!empty($header_decorative)): ?>
                                        <div class="header-decorative justify-content-center mb-2 mt-150">
                                            <span></span>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <div class="owl-carousel owl-theme position-relative">
                                    <?php foreach ($sliders as $slider):
                                        $testimonial = $slider['testimonial'];
                                        $author = $slider['author'];
                                        ?>
                                        <div class="item">
                                            <p><?php echo $testimonial; ?>
                                                <?php if (!empty($author)): ?>
                                                    <span class="d-block">- <?php echo $author; ?></span>
                                                <?php endif; ?>
                                            </p>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            <?php elseif ($layout['acf_fc_layout'] == 'image_slider'): ?>

                <?php
                $spacing = $layout['spacing'] ?? [];
                $py = in_array('py-5', $spacing) ? 'py-5' : '';
                $my = in_array('my-5', $spacing) ? 'my-5' : '';

                // Initialize classes array
                $classes = ['py-4'];

                // Conditional classes
                if (!empty($background_image)) {
                    $classes[] = 'full-width-content--dark';
                }
                if (!empty($py)) {
                    $classes[] = 'py-5';
                }
                if (!empty($my)) {
                    $classes[] = 'my-5';
                }
                $classes_string = implode(' ', $classes);

                $sliders = $layout['slider_images'];
                $heading_section = $layout['heading_section'];
                $header_decorative = $heading_section['header_decorative'];
                ?>

                <section class="<?php echo esc_attr($classes_string); ?>">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-10 text-center">
                                <?php if (!empty($heading_section)): ?>
                                    <h2 class="h1"><?php echo $heading_section['header']; ?></h2>
                                    <?php if (!empty($header_decorative)): ?>
                                        <div class="header-decorative justify-content-center mb-2 mt-150">
                                            <span></span>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <div class="owl-carousel owl-theme position-relative">
                                    <?php foreach ($sliders as $slider):
                                        $slideimage = $slider['slide_image'];
                                        ?>
                                        <div class="item item-img">
                                            <img src="<?php echo $slideimage['url']; ?>"
                                                 alt="<?php echo $slideimage['alt']; ?>" class="img-fluid">
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            <?php endif;
            $counter++;
        endforeach;
        wp_reset_postdata();
        ?>
    <?php endif;
endif; ?>
