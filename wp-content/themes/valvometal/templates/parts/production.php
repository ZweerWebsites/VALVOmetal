<?php

$productionPage = get_page_by_path('production');
$productions = get_children([
    'post_type' => 'page',
    'post_parent' => $productionPage->ID,
    'orderby' => 'menu_order',
    'order' => 'ASC',
]);

?>

<div class="container production-container">
    <div class="card-group">
        <?php

        $index = 0;
        foreach ($productions as $production) {
            $title = get_the_title($production);

            $title = explode(' ', $title);
            $title[0] = '<strong>' . $title[0] . '</strong>';
            $title = implode(' ', $title);

        ?>
            <!-- <?php #var_dump($production) ?> -->
            <div class="card card-production">
                <div class="card-body">
                    <h3><?= get_the_title($productionPage) ?></h3>

                    <h4 class="card-title">
                        <small><?= ++$index ?>.</small>
                        <a href="<?= get_permalink($production) ?>"><?= $title ?></a>
                    </h4>

                    <p class="card-text">
                        <a href="<?= get_permalink($production) ?>">
                            <?= get_the_excerpt($production) ?>
                        </a>
                    </p>

                    <a class="btn btn-primary" href="<?= get_permalink($production) ?>">&rightarrow;</a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
