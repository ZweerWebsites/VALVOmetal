<?php

/**
 * Template Name: Quality
 */

get_header();

get_template_part('templates/parts/certifications');
get_template_part('templates/parts/quality', 'assurance');
get_template_part('templates/parts/testing');
get_template_part('templates/parts/production');
get_template_part('templates/parts/newsletter');
get_template_part('templates/parts/spacer');
get_template_part('templates/parts/contacts');

get_footer();
