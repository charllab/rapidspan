<?php
$body = get_field('body');
//dump($body);
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
                $background_image = $layout['background_image'];
                $content_width = $layout['content_width'];
                $content_block = $layout['structure']['content_block'];
                $header_image = $layout['structure']['content_block']['image_header'];
                $buttons = $layout['structure']['content_block']['buttons']['button'];
                $spacing = $layout['spacing'];
                //dump($layout);
                if($spacing && in_array('py-7', $spacing)) {
                    $py = 'py-7';
                }
                if($spacing && in_array('my-7', $spacing)) {
                    $my = 'my-7';
                }
                ?>

                <section class="full-width-content<?php echo $bgi = (!empty($background_image)) ? ' full-width-content--dark' : ''; ?> my-5 py-5<?php echo $py = (!empty($py)) ? ' py-7' : ''; ?><?php echo $my = (!empty($my)) ? ' my-7' : ''; ?> position-relative z-index--1">
                    <?php if (!empty($background_image)): ?>
                        <img src="<?php echo $background_image['url']; ?>" alt="<?php echo $background_image['url']; ?>"
                             class="full-width-content--dark--bg position-absolute z-index-1"
                             aria-hidden="true"
                        >
                        <div class="block__img-overlay position-absolute z-index-1" aria-hidden="true"></div>
                    <?php endif; ?>
                    <div class="container position-relative z-index-2">
                        <div class="row justify-content-center">
                            <div class="col-md-10 <?php echo $content_width; ?> text-center">
                                <?php if (!empty($header_image)): ?>
                                    <img src="<?php echo $header_image['url']; ?>"
                                         alt="<?php echo $header_image['alt']; ?>"
                                         class="full-width-content-header-icon img-fluid mb-150">
                                <?php endif; ?>
                                <?php if (!empty($content_block['above_header'])): ?>
                                    <p class="h3 mb-1"><?php echo $content_block['above_header']; ?></p>
                                <?php endif; ?>
                                <h2 class="h1"><?php echo $content_block['header']; ?></h2>
                                <?php if (!empty($content_block['below_header'])): ?>
                                    <h3><?php echo $content_block['below_header']; ?></h3>
                                <?php endif; ?>
                                <?php if ($content_block['header_decorative']): ?>
                                    <div class="header-decorative d-flex justify-content-center mb-2 mt-150">
                                        <span></span>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($content_block['content'])): ?>
                                    <?php echo $content_block['content']; ?>
                                <?php endif; ?>
                                <?php if (!empty($buttons)): ?>
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
                                <?php endif; ?>
                            </div><!--col-->
                        </div><!--row-->
                    </div><!--container-->
                </section>


            <?php elseif ($layout['acf_fc_layout'] == 'columned_content'): ?>

                <?php
                dump($layout);
                ?>


            <?php elseif ($layout['acf_fc_layout'] == 'cards'): ?>
                <?php $cards = $layout['structure']['cards'];; ?>; ?>
                <p>This is cards</p>
                <!--            --><?php //dump($cards); ?>


            <?php elseif ($layout['acf_fc_layout'] == 'carousel'): ?>
                <!--            --><?php //$carousel = $layout['structure']['carousel'];; ?>
                <p>please add your slider code here</p>
                <!--            --><?php //dump($carousel); ?>
            <?php endif;
            $counter++;
        endforeach;
        wp_reset_postdata();
        ?>
    <?php endif;
endif; ?>
