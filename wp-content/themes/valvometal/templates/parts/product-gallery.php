<?php

$images = get_field('gallery');

?>

    <div class="product_gallery-container">
        <div class="container">
            <div class="row">
                <div class="col-md-6 d-none d-sm-block gallery-preview" style="background-image: url('<?= $images[0]['url'] ?>')"><h4>01</h4></div>
                <div class="col-md-3 gallery-button">
                    <h3><?= get_the_title() ?> Photogallery</h3>

                    <a href="#" class="btn btn-light">Discover <?= count($images) ?> photos</a>

                    <div class="product-gallery">
                        <?php foreach ($images as $image) : ?>
                        <a href="<?= $image['url'] ?>"><img src="<?= $image['url'] ?>"></a>
                        <?php endforeach ?>
                    </div>
                </div>
                <div class="col-md-3 d-none d-sm-block gallery-preview" style="background-image: url('<?= $images[1]['url'] ?>')"><h4>02</h4></div>
            </div>

            <div class="row">
                <div class="col-md-6 d-none d-sm-block gallery-preview" style="background-image: url('<?= $images[2]['url'] ?>')"><h4>03</h4></div>
                <div class="col-md-6 d-none d-sm-block gallery-preview" style="background-image: url('<?= $images[3]['url'] ?>')"><h4>04</h4></div>
            </div>
        </div>
    </div>
<?php

