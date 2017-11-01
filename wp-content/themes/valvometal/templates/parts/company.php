<?php

$contents = get_field('content');

?>

<div class="company-container">
    <?php foreach ($contents as $content) : ?>
        <div class="company-content-<?= $content['acf_fc_layout'] ?>">
            <?php

            # var_dump($content);

            switch ($content['acf_fc_layout']) {
                case 'text':
                    ?>
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <h4><?= $content['subtitle'] ?></h4>
                        <h3><?= $content['title'] ?></h3>
                    </div>

                    <div class="col-6">
                        <?= $content['text'] ?>

                        <?php if ($content['link']) : ?>
                            <a href="<?= $content['link'] ?>" class="btn btn-primary">Discover More</a>
                        <?php endif ?>
                    </div>
                </div>
            </div>
                    <?php
                    break;

                case 'images':
                    $images = $content['images'];
                    $imageClass = 12 / count($images);
                    ?>
            <div class="container-fluid">
                <div class="row">
                    <?php foreach ($images as $index => $image) : ?>
                    <div class="col-md-<?= $imageClass ?> col-<?= $imageClass * 2 ?>" style="background-image: url('<?= wp_get_attachment_image_url($image['image'], 'half') ?>');">
                        <?php if ($index === 0) : ?>
                            <h4><?= $content['subtitle'] ?></h4>
                        <?php endif ?>

                        <h3><?= $image['text'] ?></h3>
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
                    <?php
                    break;
            }

            ?>
        </div>
    <?php endforeach ?>
</div>
