<?php

/**
 * Utils file with some enhancements I collected over the years
 */

/**
 * Flush the rewrite rules on theme switch
 *
 * TBH I don't remember if it flushes the rewrite table on theme switch, just
 * make it for sure (:
 */
add_action('after_switch_theme', function () {
    flush_rewrite_rules();
});

/**
 * Fixes an iOS bug
 *
 * It was a bug of some years ago, don't know if it already exists
 */
add_filter('nav_menu_link_attributes', function ($attributes) {
    $attributes['ontouchstart'] = ' ';
    return $attributes;
});

function the_retina_image($attachmentId, $attrs = []) {
    $attrs['src'] = wp_get_attachment_image_url($attachmentId, 'half');
    $attrs['srcset'] = wp_get_attachment_image_srcset($attachmentId, 'half');
    $attrs['sizes'] = wp_get_attachment_image_sizes($attachmentId, 'half');

    $html = '<img';

    foreach($attrs as $attr => $value) {
        $html .= ' ' . $attr . '="' . $value . '"';
    }

    $html .= '>';

    echo $html;
}

/**
 * @param integer|WP_Post $postId
 * @param string $menu
 * @return WP_Post[]
 */
function get_the_breadcrumb($menu, $postId = null) {
    if (!$postId) {
        $postId = get_the_ID();
    }

    $breadcrumb = [[
        'title' => 'Home',
        'url' => get_home_url(),
    ]];
    $menuPages = wp_get_nav_menu_items($menu);

    do {
        foreach ($menuPages as $menuPage) {
            if ($menuPage->object_id === (string)$postId) {
                array_unshift($breadcrumb, [
                    'title' => $menuPage->title,
                    'url' => $menuPage->url,
                ]);

                $postId = $menuPage->menu_parent_id;

                break;
            }
        }
    } while ($postId === '0');

    return array_reverse($breadcrumb);
}

add_filter('wpcf7_form_elements', function($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1><br[^\>]*>/i', '\2', $content);

    return $content;
});