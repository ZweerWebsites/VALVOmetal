<?php

add_action('init', function () {
    register_nav_menu('main-menu', __('Main Menu'));
});
