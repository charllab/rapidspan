<?php
// Get the variables passed from the main template
$content_block = get_query_var('content_block', []);
// Initialize variables with checks
$header_image = $content_block['image_header'] ?? null;
$header_icon = $content_block['header_icon'] ?? null;
$buttons = $content_block['buttons']['button'] ?? [];
$header_decorative = $content_block['header_decorative'] ?? false;
?>

<?php if (!empty($header_image)): ?>
<div>
    <img src="<?php echo esc_url($header_image['url']); ?>"
         alt="<?php echo esc_attr($header_image['alt']); ?>"
         class="img-fluid mb-150">
</div>
<?php endif; ?>
<?php if (!empty($header_icon)): ?>
<div>
    <img src="<?php echo esc_url($header_icon['url']); ?>"
         alt="<?php echo esc_attr($header_icon['alt']); ?>"
         class="full-width-content-header-icon img-fluid mb-150">
</div>
<?php endif; ?>

<?php if (!empty($content_block['above_header'])): ?>
    <p class="h3 mb-1 text-uppercase"><?php echo esc_html($content_block['above_header']); ?></p>
<?php endif; ?>

<?php if (!empty($content_block['header'])): ?>
<h2 class="header-title"><?php echo esc_html($content_block['header']); ?></h2>
<?php endif; ?>

<?php if (!empty($content_block['below_header'])): ?>
    <h3><?php echo esc_html($content_block['below_header']); ?></h3>
<?php endif; ?>

<?php if (!empty($header_decorative)): ?>
    <div class="header-decorative mb-2 mt-150">
        <span></span>
    </div>
<?php endif; ?>

<?php if (!empty($content_block['content'])): ?>
    <div class="content-block-content">
        <?php echo $content_block['content']; ?>
    </div>
<?php endif; ?>

<?php if (!empty($buttons)): ?>
    <div class="buttons">
        <?php foreach ($buttons as $button): ?>
            <?php
            $is_video = $button['is_video'] ?? [];
            $target = $button['link']['target'] ?? '';
            $button_class = $button['style'] ?? '';
            if (!empty($is_video) && in_array('js-video', $is_video)) {
                $button_class .= ' js-video-btn';
            }
            ?>
            <a href="<?php echo esc_url($button['link']['url']); ?>"
               class="btn <?php echo esc_attr($button_class); ?> mb-250"
                <?php if (!empty($target)): ?>
                    target="<?php echo esc_attr($target); ?>"
                <?php endif; ?>
            >
                <?php echo esc_html($button['link']['title']); ?>
            </a>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
