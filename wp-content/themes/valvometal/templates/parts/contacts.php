<?php

$contactsPage = get_page_by_path('contact');
$productionPage = get_page_by_path('main-products');

$menuPages = wp_get_nav_menu_items('main-menu');

?>

<div class="contacts-container">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-lg-7">
                <div class="row justify-content-center">
                    <div class="col-7 col-md-6">
                        <h3><strong>Valvometal</strong></h3>

                        <ul class="list-unstyled">
                            <?php foreach ($menuPages as $menuPage) : ?>
                                <?php if ($menuPage->menu_item_parent !== '0') continue ?>
                                <?php if (implode('', $menuPage->classes) === 'hide-footer') continue ?>
                            <li><a href="<?= $menuPage->url ?>"><?= $menuPage->title ?></a></li>
                            <?php endforeach ?>
                        </ul>
                    </div>

                    <div class="col-7 col-md-6">
                        <h3><strong><?= get_the_title($productionPage) ?></strong></h3>

                        <ul class="list-unstyled">
                            <?php foreach ($menuPages as $menuPage) : ?>
                                <?php if ($menuPage->post_parent !== $productionPage->ID) continue ?>
                                <li><a href="<?= $menuPage->url ?>"><?= $menuPage->title ?></a></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <h3><strong><?= get_the_title($contactsPage) ?></strong></h3>

                <p><?= get_the_excerpt($contactsPage) ?></p>

                <a href="<?= get_permalink($contactsPage) ?>" class="btn btn-primary"><?= get_the_title($contactsPage) ?></a>
            </div>
        </div>
    </div>
</div>
