<?php

/**
 * Template Name: Company
 */

get_header();

get_template_part('templates/parts/company', 'values');
get_template_part('templates/parts/company');
get_template_part('templates/parts/production');
get_template_part('templates/parts/spacer');
get_template_part('templates/parts/newsletter');
get_template_part('templates/parts/spacer');
get_template_part('templates/parts/contacts');

get_footer();
