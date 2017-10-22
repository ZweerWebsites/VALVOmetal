<?php

$backgrounds = get_field('backgrounds');

if (!$backgrounds || count($backgrounds) === 0) {
    $backgrounds = [
        ['image' => get_post_thumbnail_id()],
    ];
}

?>

<div class="backgrounds">
    <div class="container-fluid">
        <?php foreach ($backgrounds as $background) : ?>
        <img src="<?= wp_get_attachment_image_src($background['image'], 'full')[0] ?>">
        <?php endforeach ?>
    </div>
</div>
