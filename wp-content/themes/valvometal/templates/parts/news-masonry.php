<?php

$news = get_posts([
    'post_type' => 'news',
    'orderby' => 'post_date',
    'numberposts' => -1,
]);

?>

<div class="news_masonry-container">
    <div class="container">
        <div class="card-columns">
            <?php foreach ($news as $new) : ?>
                <?php $categories = array_map(function ($category) { return $category->name; }, get_the_terms($new, 'news_category')) ?>
                <div class="card">
                    <small><?= implode(' - ', $categories) ?></small>

                    <?php if ($attachmentId = get_post_thumbnail_id($new)) : ?>
                        <a href="<?= get_permalink($new) ?>">
                            <?php the_retina_image($attachmentId, ['class' => 'card-img-top', 'alt' => get_the_title($new)]) ?>
                        </a>
                    <?php endif ?>

                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="<?= get_permalink($new) ?>">
                                <?= get_the_title($new) ?>
                            </a>
                        </h4>

                        <time><?= get_the_date('', $new) ?></time>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
