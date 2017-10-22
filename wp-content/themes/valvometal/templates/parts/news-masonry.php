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
                <div class="card">
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
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
