<?php

add_action('init', function () {
    add_theme_support('post-thumbnails');
    add_post_type_support('page', 'excerpt');

    register_post_type('news', [
        'label' =>  'News',
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-format-aside',

        'publicly_queryable' => true,
        'show_in_nav_menus' => true,
    ]);

    register_taxonomy('news_category', 'news', [
        'label' => 'Categoria',
        'hierarchical' => true,
    ]);
});
