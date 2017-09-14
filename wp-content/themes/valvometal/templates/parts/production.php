<?php

$productionPage = get_page_by_path('main-products');
$productions = get_children([
    'post_type' => 'page',
    'post_parent' => $productionPage->ID,
    'orderby' => 'menu_order',
    'order' => 'ASC',
]);

?>

<div class="production-container">
    <div class="container">
        <div class="card-group">
            <?php

            $index = 0;
            foreach ($productions as $production) {
                $title = get_the_title($production);

                $title = explode(' ', $title);
                $title[0] = '<strong>' . $title[0] . '</strong>';
                $title = implode(' ', $title);

                ?>
                <div class="card">
                    <div class="card-body">
                        <?php if (is_front_page()) : ?>
                            <h3><?= get_the_title($productionPage) ?></h3>
                        <?php endif ?>

                        <?php if (!is_front_page()) : ?>
                            <figure>
                                <?php the_retina_image(get_post_thumbnail_id($production), ['class' => 'mx-auto d-block img-fluid']) ?>
                            </figure>
                        <?php endif ?>

                        <h4 class="card-title">
                            <small><?= ++$index ?></small>

                            <a href="<?= get_permalink($production) ?>"><?= $title ?></a>
                        </h4>

                        <?php if (is_front_page()) : ?>
                            <p class="card-text">
                                <a href="<?= get_permalink($production) ?>">
                                    <?= get_the_excerpt($production) ?>
                                </a>
                            </p>
                        <?php endif ?>

                        <a class="btn btn-primary" href="<?= get_permalink($production) ?>">&rightarrow;</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
