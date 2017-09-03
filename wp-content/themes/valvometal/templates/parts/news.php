<?php

$newsPosts = get_posts([
    'post_type' => 'news',
    'numberposts' => 3,
    'meta_key' => 'in_homepage',
    'meta_value' => true,
]);

?>

<div class="news-container">
    <div class="container">
        <div class="card-group">
            <?php foreach ($newsPosts as $newsPost) :
                $categories = get_the_terms($newsPost, 'news_category');
                $category = implode(', ', array_map(function ($cat) {
                    return $cat->name;
                }, $categories));

            ?>
                <!-- <?php #var_dump($newsPost) ?> -->
                <!-- <?php #var_dump($category) ?> -->
                <div class="card">
                    <div class="card-body">
                        <small><?= $category ?></small>

                        <h4 class="card-title">
                            <a href="<?= get_permalink($newsPost) ?>"><?= get_the_title($newsPost) ?></a>
                        </h4>

                        <time><?= get_the_date('j F Y', $newsPost) ?></time>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
