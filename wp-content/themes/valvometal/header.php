<?php

require_once('inc/vendor/class-wp-bootstrap-navwalker.php');

get_header('html');

$logoId = get_field('logo', 'option');
$logoDarkId = get_field('logo_dark', 'option');

$backgrounds = is_404() ?
    get_field('404-background', 'option')
    :
    get_field('backgrounds');
$isLightBackground = get_field('light_background');

if ($backgrounds || get_the_post_thumbnail_url()) {
    get_template_part('templates/parts/backgrounds');
}

?>

<nav class="navbar navbar-expand-lg <?= $isLightBackground ? 'navbar-light' : 'navbar-dark' ?> bg-transparent">
    <a class="navbar-brand" href="<?= get_home_url() ?>">
        <?php the_retina_image($isLightBackground ? $logoDarkId : $logoId) ?>
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
    <a class="navbar-brand" href="<?= get_home_url() ?>">
        <?php the_retina_image($logoDarkId) ?>
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <?php wp_nav_menu([
        'menu' => 'main-menu',
        'container' => 'div',
        'container_id' => 'navbarNavAltMarkup',
        'container_class' => 'collapse navbar-collapse align-self-center',
        'menu_class' => 'navbar-nav ml-auto',
        'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
        'walker' => new WP_Bootstrap_Navwalker(),
    ]) ?>
</nav>

<header>
    <?php if (is_front_page()) : ?>
        <h1><?= get_bloginfo('name') ?></h1>
        <p><?= get_bloginfo('description') ?></p>

        <div>
            <a class="btn btn-primary" href="/">Lorem ipsum</a>
        </div>
    <?php else : ?>
        <ol class="breadcrumb">
            <?php $breadcrumbs = get_the_breadcrumb('main-menu') ?>
            <?php foreach ($breadcrumbs as $index => $page) : ?>
                <?php $isActive = $index === count($breadcrumbs) - 1 ?>
                <li class="breadcrumb-item <?= $isActive ? 'active' : '' ?>">
                    <?php if (!$isActive) : ?><a href="<?= $page['url'] ?>"><?php endif ?>
                        <?= $page['title'] ?>
                    <?php if (!$isActive) : ?></a><?php endif ?>
                </li>
            <?php endforeach ?>
        </ol>

        <h1><?= is_404() ? get_field('404-title', 'option') : get_the_title() ?></h1>
        <?php is_404() ? the_field('404-content', 'option') : the_content() ?>

        <?php if (is_404()) : ?>
        <div>
            <a class="btn btn-primary" href="/">Torna alla home</a>
        </div>
        <?php endif ?>
    <?php endif ?>
</header>
