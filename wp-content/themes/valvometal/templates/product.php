<?php

/**
 * Template Name: Product
 */

get_header();

get_template_part('templates/parts/product', 'content');
get_template_part('templates/parts/spacer');
get_template_part('templates/parts/product', 'gallery');
get_template_part('templates/parts/newsletter');
get_template_part('templates/parts/spacer');
get_template_part('templates/parts/contacts');

get_footer();
