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
                    <div class="col-md-6">
                        <h3><?= $location['role'] ?></h3>

                        <address><?= $location['address']['address'] ?></address>

                        <ul class="list-unstyled">
                            <?php if ($location['phone']) : ?><li class="contact-desktop"><i class="fa fa-phone"></i><?= $location['phone'] ?></li><?php endif ?>
                            <?php if ($location['phone']) : ?><li class="contact-mobile"><a href="tel:<?= $location['phone'] ?>"><i class="fa fa-phone"></i></a></li><?php endif ?>
                            <?php if ($location['fax']) : ?><li class="contact-desktop"><i class="fa fa-print"></i><?= $location['fax'] ?></li><?php endif ?>
                            <?php if ($location['fax']) : ?><li class="contact-mobile"><a href="tel:<?= $location['fax'] ?>"><i class="fa fa-print"></i></a></li><?php endif ?>
                            <?php if ($location['email']) : ?><li class="contact-desktop"><i class="fa fa-envelope"></i><a href="mailto:<?= $location['email'] ?>"><?= $location['email'] ?></a></li><?php endif ?>
                            <?php if ($location['email']) : ?><li class="contact-mobile"><a href="mailto:<?= $location['email'] ?>"><i class="fa fa-envelope"></i></a></li><?php endif ?>
                        </ul>

                        <div class="map" data-lat="<?= $location['address']['lat'] ?>" data-lng="<?= $location['address']['lng'] ?>"></div>
                    </div>

                    <?php if ($location['image']) : ?>
                        <div class="col-md-6 contacts-page-image" style="background-image: url(<?= wp_get_attachment_image_url($location['image'], 'half') ?>);"></div>
                    <?php endif ?>
                <?php endforeach ?>
            </div>
        <?php endforeach ?>
    </div>
</div>
