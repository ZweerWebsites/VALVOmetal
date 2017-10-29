<?php

$backgrounds = is_404() ? [['image' => get_field('404-background', 'option')]] : get_field('backgrounds');

if (!$backgrounds || count($backgrounds) === 0) {
    $backgrounds = [
        ['image' => get_post_thumbnail_id()],
    ];
}

?>

<div class="backgrounds">
    <div class="container-fluid">
        <?php foreach ($backgrounds as $background) : ?>
        <div class="background" style="background-image: url('<?= wp_get_attachment_image_src($background['image'], 'full')[0] ?>');"></div>
        <?php endforeach ?>
    </div>
</div>
