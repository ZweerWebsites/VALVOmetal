<?php

$productionPage = get_page_by_path('main-products');
$productions = get_children([
    'post_type' => 'page',
    'post_parent' => $productionPage->ID,
    'orderby' => 'menu_order',
    'order' => 'ASC',
]);

$menuPages = wp_get_nav_menu_items('main-menu');
$menuPageIds = array_map(function ($menuPage) {
    return (int) $menuPage->object_id;
}, $menuPages);

?>

<div class="production-others-container">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2><?= get_field('other_products_title', $productionPage) ?></h2>
            </div>
        </div>

        <?php foreach ($productions as $production) : ?>
            <?php if (in_array($production->ID, $menuPageIds)) continue ?>

            <?php

            $title = get_the_title($production);
            $title = explode(' ', $title);
            $title[1] = '<strong>' . $title[1] . '</strong>';
            $title = implode(' ', $title);

            ?>
            <div class="row">
                <div class="col-6" style="background-image: url('<?= wp_get_attachment_image_url(get_post_thumbnail_id($production), 'half') ?>');"></div>

                <div class="col-6">
                    <h3><?= $title ?></h3>
                    <p><?= get_the_excerpt($production) ?></p>
                    <a href="<?= get_permalink($production) ?>" class="btn btn-outline-primary">Discover More</a>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>
