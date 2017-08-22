<?php

add_action('admin_menu', function () {
    remove_menu_page('edit.php');
});

add_action('init', function () {
    if(function_exists('acf_add_options_page')) {
        acf_add_options_page('Opzioni Tema');
    }
});
