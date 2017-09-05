<?php

require_once('inc/vendor/class-wp-bootstrap-navwalker.php');

get_header('html');

$logoId = get_field('logo', 'option');
$logoDarkId = get_field('logo_dark', 'option');

?>

<nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
    <a class="navbar-brand" href="<?php get_permalink(get_page_by_path('homepage')) ?>">
        <?php the_retina_image($logoId) ?>
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <?php wp_nav_menu([
        'menu' => 'main-menu',
        'container' => 'div',
        'container_id' => 'navbarNavAltMarkup',
        'container_class' => 'collapse navbar-collapse align-self-start',
        'menu_class' => 'navbar-nav ml-auto',
        'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
        'walker' => new WP_Bootstrap_Navwalker(),
    ]) ?>
</nav>

<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-white navbar-hidden">
    <a class="navbar-brand" href="<?php get_permalink(get_page_by_path('homepage')) ?>">
        <?php the_retina_image($logoDarkId) ?>
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <?php wp_nav_menu([
        'menu' => 'main-menu',
        'container' => 'div',
        'container_id' => 'navbarNavAltMarkup',
        'container_class' => 'collapse navbar-collapse align-self-start',
        'menu_class' => 'navbar-nav ml-auto',
        'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
        'walker' => new WP_Bootstrap_Navwalker(),
    ]) ?>
</nav>

<header>
    <h1><?= get_bloginfo('name') ?></h1>
    <p><?= get_bloginfo('description') ?></p>

    <div>
        <a class="btn btn-primary" href="/">Lorem ipsum</a>
    </div>
</header>
