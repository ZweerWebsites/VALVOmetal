<?php

$backgrounds = get_field('backgrounds');

?>

<div class="backgrounds">
    <div class="container-fluid">
        <?php foreach ($backgrounds as $background) : ?>
        <img src="<?= wp_get_attachment_image_src($background['image'], 'full')[0] ?>">
        <?php endforeach ?>
    </div>
</div>
