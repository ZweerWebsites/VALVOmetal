<?php

$isNews = is_singular('news');

if ($isNews) {
    $newsPosts = [
        get_previous_post(),
        get_next_post(),
    ];
} else {
    $newsPosts = get_posts([
        'post_type' => 'news',
        'numberposts' => 3,
        'meta_key' => 'in_homepage',
        'meta_value' => true,
    ]);
}

?>

<div class="news-container">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-<?= $isNews ? '8' : '12' ?>">
                <div class="card-group">
                    <?php foreach ($newsPosts as $index => $newsPost) :
                        $categories = get_the_terms($newsPost, 'news_category');
                        $category = implode(', ', array_map(function ($cat) {
                            return $cat->name;
                        }, $categories));

                        ?>
                        <div class="card">
                            <div class="card-body">
                                <?php if ($isNews) : ?>
                                <a href="<?= get_permalink($newsPost) ?>" class="prev-next <?= $index === 0 ? 'prev' : 'next' ?>">
                                    <?= $index === 0 ? '&leftarrow; Prev' : 'Next &rightarrow;' ?>
                                </a>
                                <?php endif ?>

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
    </div>
</div>
