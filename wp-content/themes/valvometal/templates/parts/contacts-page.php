<?php

$contacts = get_field('contacts');

?>

<div class="contacts-page-container">
    <div class="container">
        <?php foreach ($contacts as $index => $contact) : ?>
            <div class="row">
                <div class="col-md-6">
                    <h2><?= $contact['nation'] ?></h2>
                </div>

                <?php if ($index === 0) : ?>
                <div class="col-md-6 linkedin">
                    Do you want to work with us?

                    <a href="https://www.linkedin.com/company/10436117/" target="_blank" class="btn btn-light">
                        <i class="fa fa-linkedin"></i>
                        Visit our profile
                    </a>
                </div>
                <?php endif ?>
            </div>

            <div class="row">
                <?php foreach ($contact['locations'] as $location) : ?>
                    <div class="col-md-6">
                        <h3><?= $location['role'] ?></h3>

                        <address><?= $location['address']['address'] ?></address>

                        <ul class="list-unstyled d-none d-md-block">
                            <?php if ($location['phone']) : ?><li class="contact-desktop"><i class="fa fa-phone"></i><?= $location['phone'] ?></li><?php endif ?>
                            <?php if ($location['fax']) : ?><li class="contact-desktop"><i class="fa fa-print"></i><?= $location['fax'] ?></li><?php endif ?>
                            <?php if ($location['email']) : ?><li class="contact-desktop"><i class="fa fa-envelope"></i><a href="mailto:<?= $location['email'] ?>"><?= $location['email'] ?></a></li><?php endif ?>
                        </ul>

                        <ul class="list-inline d-md-none text-center">
                            <?php if ($location['phone']) : ?><li class="list-inline-item contact-mobile"><a href="tel:<?= $location['phone'] ?>"><i class="fa fa-phone fa-2x"></i></a></li><?php endif ?>
                            <?php if ($location['fax']) : ?><li class="list-inline-item contact-mobile"><a href="tel:<?= $location['fax'] ?>"><i class="fa fa-print fa-2x"></i></a></li><?php endif ?>
                            <?php if ($location['email']) : ?><li class="list-inline-item contact-mobile"><a href="mailto:<?= $location['email'] ?>"><i class="fa fa-envelope fa-2x"></i></a></li><?php endif ?>
                        </ul>

                        <div class="map" data-lat="<?= $location['address']['lat'] ?>" data-lng="<?= $location['address']['lng'] ?>"></div>
                    </div>

                    <?php if ($location['image']) : ?>
                        <div class="col-md-6 contacts-page-image d-none d-md-block" style="background-image: url(<?= wp_get_attachment_image_url($location['image'], 'half') ?>);"></div>
                    <?php endif ?>
                <?php endforeach ?>
            </div>
        <?php endforeach ?>
    </div>
</div>
