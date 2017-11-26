<?php

$qualityPage = get_page_by_path('quality');

?>

<div class="quality-container">
    <div class="quality-jumbo">make flow feel the flow</div>

    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-6 quality-title">
                <small><?= $qualityPage->post_name ?></small>
                <h3><strong><?= get_the_title($qualityPage) ?></strong></h3>

                <?php the_retina_image(get_post_thumbnail_id($qualityPage), ['class' => 'mx-auto d-block img-fluid invisible']) ?>
            </div>

            <div class="col-md-6 quality-text">
                <?= apply_filters('the_content', $qualityPage->post_content) ?>

                <a href="<?= get_permalink($qualityPage) ?>" class="btn btn-primary">Discover More</a>
            </div>
        </div>
    </div>
</div>
