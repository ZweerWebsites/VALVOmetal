<?php

$customersPage = get_page_by_path('references');

$customers = get_field('customers', $customersPage);
$customers = array_slice($customers, 0, 2);

?>

<div class="customers-container">
    <div class="container">
        <div class="row">
            <div class="col-md-8 order-2 order-sm-1">
                <div class="card-group invisible">
                    <?php foreach ($customers as $customer) : ?>
                    <div class="card">
                        <div class="card-body">
                            <?php the_retina_image($customer['image']) ?>

                            <div class="card-title"><strong><?= $customer['name'] ?></strong></div>

                            <div class="card-text">
                                <ul class="list-unstyled">
                                    <li><strong>Site name:</strong> <?= $customer['site_name'] ?></li>
                                    <li><strong>Year of construction:</strong> <?= $customer['build_year'] ?></li>
                                    <li><strong>Nation:</strong> <?= $customer['nation'] ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>
                </div>
            </div>

            <div class="col-md-4 order-1 order-sm-2">
                <h3><?= get_the_title($customersPage) ?></h3>
                <h4><?= get_the_excerpt($customersPage) ?></h4>
                <a class="btn btn-primary" href="<?= get_permalink($customersPage) ?>"><?= get_the_title($customersPage) ?></a>
            </div>
        </div>
    </div>
</div>
