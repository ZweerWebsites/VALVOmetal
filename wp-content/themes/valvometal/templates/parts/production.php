<?php

$productionPage = get_page_by_path('production');
$productions = get_children([
    'post_type' => 'page',
    'post_parent' => $productionPage->ID,
    'orderby' => 'menu_order',
    'order' => 'ASC',
]);

?>

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
            <!-- <?php var_dump($production) ?> -->
            <div class="card card-production">
                <div class="card-body">
                    <h4 class="card-title">
                        <small><?= ++$index ?>.</small>
                        <?= $title ?>
                    </h4>

                    <p class="card-text"><?= get_the_excerpt($production) ?></p>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
