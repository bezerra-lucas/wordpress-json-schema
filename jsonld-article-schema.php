<?php
/**
 * Plugin Name: JSON-LD Article Schema for Posts
 * Description: Adds JSON-LD Article schema to WordPress posts.
 * Version: 1.0
 * Author: Lucas Bezerra
 * Author URI: https://github.com/bezerra-lucas
 */

function jsonld_article_schema_output() {
    if (is_single()) {
        global $post;
        $schema = array(
            '@context' => 'https://schema.org',
            '@type' => 'Article',
            'mainEntityOfPage' => array(
                '@type' => 'WebPage',
                '@id' => get_permalink($post->ID),
            ),
            'headline' => get_the_title($post->ID),
            'datePublished' => get_the_date('c', $post->ID),
            'dateModified' => get_the_modified_date('c', $post->ID),
            'author' => array(
                '@type' => 'Person',
                'name' => get_the_author_meta('display_name', $post->post_author),
            ),
            'publisher' => array(
                '@type' => 'Organization',
                'name' => get_bloginfo('name'),
                'logo' => array(
                    '@type' => 'ImageObject',
                    'url' => 'https://www.example.com/path/to/your/logo.png', // Replace with your logo URL
                ),
            ),
            'description' => get_the_excerpt($post->ID),
        );

        if (has_post_thumbnail($post->ID)) {
            $thumbnail_id = get_post_thumbnail_id($post->ID);
            $thumbnail_data = wp_get_attachment_image_src($thumbnail_id, 'full');
            $schema['image'] = array(
                '@type' => 'ImageObject',
                'url' => $thumbnail_data[0],
                'width' => $thumbnail_data[1],
                'height' => $thumbnail_data[2],
            );
        }

        echo '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_SLASHES) . '</script>';
    }
}

add_action('wp_head', 'jsonld_article_schema_output');
