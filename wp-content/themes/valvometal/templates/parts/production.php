<?php

$thisPage = get_post();

$productionPage = get_page_by_path('main-products');
$menuPages = wp_get_nav_menu_items('main-menu');

?>

<div class="production-container">
    <div class="container">
        <div class="card-group invisible">
            <?php

            $index = 0;
            foreach ($menuPages as $menuPage) {
                if ($menuPage->post_parent !== $productionPage->ID) {
                    continue;
                }

                $title = $menuPage->title;

                $title = explode(' ', $title);
                $title[0] = '<strong>' . $title[0] . '</strong>';
                $title = implode(' ', $title);

                ?>
                <div class="card">
                    <div class="card-body">
                        <?php if ($productionPage->ID !== $thisPage->ID) : ?>
                            <h3><?= get_the_title($productionPage) ?></h3>
                        <?php endif ?>

                        <?php if ($productionPage->ID === $thisPage->ID) : ?>
                            <a href="<?= $menuPage->url ?>"><figure>
                                <?php the_retina_image(get_post_thumbnail_id($menuPage->object_id), ['class' => 'mx-auto d-block img-fluid']) ?>
								</figure></a>
                        <?php endif ?>

                        <h4 class="card-title">
                            <small><?= ++$index ?></small>

                            <a href="<?= $menuPage->url ?>"><?= $title ?></a>
                        </h4>

                        <?php if ($productionPage->ID !== $thisPage->ID) : ?>
                            <p class="card-text">
                                <a href="<?= $menuPage->url ?>">
                                    <?= get_the_excerpt($menuPage->object_id) ?>
                                </a>
                            </p>
                        <?php endif ?>

                        <a class="btn btn-primary" href="<?= $menuPage->url ?>">&rightarrow;</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
