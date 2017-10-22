<?php

$templates = get_field('body');
$categories = array_map(function ($category) { return $category->name; }, get_the_terms(get_the_ID(), 'news_category'));

?>

<div class="news-single-container">
    <div class="container">
        <div class="row">
            <div class="col-2"></div>

            <div class="col-8">
                <div class="news-meta">
                    <?= get_the_date('l, F j, Y') ?> | <?= implode(' - ', $categories) ?>
                </div>

                <div class="news-content">
                    <?php

                    foreach ($templates as $template) {
                        ?>
                        <div class="news-content-single news-content-<?= $template['acf_fc_layout'] ?>">
                        <?php

                        switch ($template['acf_fc_layout']) {
                            case 'text':
                                echo $template['text'];
                                break;

                            case 'images':
                                foreach ($template['images'] as $image) {
                                    the_retina_image($image['id'], ['class' => 'img-thumbnail col-3']);
                                }
                                break;
                        }

                        ?>
                        </div>
                        <?php
                    }

                    ?>
                </div>
            </div>
        </div>
    </div>
</div>