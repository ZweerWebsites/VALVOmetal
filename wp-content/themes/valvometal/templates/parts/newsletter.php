<?php

$isProduct = get_page_template_slug() === 'templates/product.php';

?>

<div class="newsletter-container">
    <?php if ($isProduct) : ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-6 col-newsletter">
                    <div class="row">
                        <div class="col">
                            <small>Newsletter subscription</small>

                            <h3><strong>Subscribe to our newsletter and stay tuned</strong></h3>
                        </div>
                    </div>

                    <?= do_shortcode('[mc4wp_form id="79"]') ?>
                </div>

                <div class="col-6 col-newsletter">
                    <div class="row">
                        <div class="col">
                            <small>More information</small>

                            <h3><strong>Do you need more information about our <?= get_the_title() ?>?</strong></h3>

                            <a href="<?= get_permalink(get_page_by_path('contact')) ?>" class="btn btn-light">Contact us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php else : ?>
        <div class="container">
            <div class="row">
                <div class="col">
                    <small>Newsletter subscription</small>

                    <h3><strong>Subscribe to our newsletter and stay tuned</strong></h3>
                </div>
            </div>

            <?= do_shortcode('[mc4wp_form id="79"]') ?>
        </div>
    <?php endif ?>
</div>
