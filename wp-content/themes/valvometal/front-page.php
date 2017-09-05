<?php

get_header();

get_template_part('templates/parts/production');
get_template_part('templates/parts/quality');
get_template_part('templates/parts/news');
get_template_part('templates/parts/newsletter');
get_template_part('templates/parts/customer', 'map');
get_template_part('templates/parts/customers');
get_template_part('templates/parts/contacts');

get_footer();
