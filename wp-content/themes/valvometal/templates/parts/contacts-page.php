<?php

$contacts = get_field('contacts');

?>

<div class="contacts-page-container">
    <div class="container">
        <?php foreach ($contacts as $contact) : ?>
            <div class="row">
                <div class="col">
                    <h2><?= $contact['nation'] ?></h2>
                </div>
            </div>

            <div class="row">
                <?php foreach ($contact['locations'] as $location) : ?>
                    <div class="col-6">
                        <h3><?= $location['role'] ?></h3>

                        <address><?= $location['address']['address'] ?></address>

                        <ul class="list-unstyled">
                            <?php if ($location['phone']) : ?><li><i class="fa fa-phone"></i> <?= $location['phone'] ?></li><?php endif ?>
                            <?php if ($location['fax']) : ?><li><i class="fa fa-print"></i><?= $location['fax'] ?></li><?php endif ?>
                            <?php if ($location['email']) : ?><li><i class="fa fa-envelope"></i><?= $location['email'] ?></li><?php endif ?>
                        </ul>

                        <div class="map" data-lat="<?= $location['address']['lat'] ?>" data-lng="<?= $location['address']['lng'] ?>"></div>
                    </div>

                    <?php if ($location['image']) : ?>
                        <div class="col-6" style="background-image: url(<?= wp_get_attachment_image_url($location['image'], 'half') ?>);"></div>
                    <?php endif ?>
                <?php endforeach ?>
            </div>
        <?php endforeach ?>
    </div>
</div>
