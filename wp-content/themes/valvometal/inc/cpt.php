<?php

add_action('init', function () {
    register_post_type('news', [
        'label' =>  'News',
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-format-aside',

        'publicly_queryable' => true,
        'show_in_nav_menus' => true,
    ]);
});
