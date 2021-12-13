<?php

/**
 * Gutenberg blocks setup
 */

$stdp_blocks = array(
    /**
     * ITR blocks
     */
    array(
        'name' => 'block-editor',
        'title' => 'Block Editor',
        'description' => 'A default editor block.',
        'category' => 'itr-blocks',
        'icon' => 'edit',
    ),
    array(
        'name' => 'block-cta',
        'title' => 'Block CTA',
        'description' => 'A default cta block.',
        'category' => 'itr-blocks',
        'icon' => 'megaphone',
    ),
    array(
        'name' => 'block-flex',
        'title' => 'Block Flexible columns',
        'description' => 'A default flexible columns block.',
        'category' => 'itr-blocks',
        'icon' => 'tagcloud',
    ),
    array(
        'name' => 'block-forms',
        'title' => 'Block Forms',
        'description' => 'A default forms block.',
        'category' => 'itr-blocks',
        'icon' => 'editor-table',
    ),
    array(
        'name' => 'block-gallery',
        'title' => 'Block Gallery',
        'description' => 'A default gallery block.',
        'category' => 'itr-blocks',
        'icon' => 'images-alt2',
    ),
    array(
        'name' => 'block-hero',
        'title' => 'Block Hero',
        'description' => 'A default hero block.',
        'category' => 'itr-blocks',
        'icon' => 'image-filter',
    ),
    array(
        'name' => 'block-image',
        'title' => 'Block Image',
        'description' => 'A default image block.',
        'category' => 'itr-blocks',
        'icon' => 'format-image',
    ),
    array(
        'name' => 'block-image-text',
        'title' => 'Block Image Text',
        'description' => 'A default image text block.',
        'category' => 'itr-blocks',
        'icon' => 'text',
    ),
    array(
        'name' => 'block-quote',
        'title' => 'Block Quote',
        'description' => 'A default quote block.',
        'category' => 'itr-blocks',
        'icon' => 'format-quote',
    ),
    array(
        'name' => 'block-slider',
        'title' => 'Block Slider',
        'description' => 'A default slider block.',
        'category' => 'itr-blocks',
        'icon' => 'format-gallery',
    ),
    array(
        'name' => 'block-video',
        'title' => 'Block Video',
        'description' => 'A default video block.',
        'category' => 'itr-blocks',
        'icon' => 'format-video',
    ),
);

/**
 * Gutenberg blocks setup logic - NOT TO BE CHANGED
 */

/**
 * Create ITR blocks
 */

add_action('acf/init', 'stdp_acf_init');
function stdp_acf_init()
{
    if (function_exists('acf_register_block_type')) {
        global $stdp_blocks;
        if (is_array($stdp_blocks) || is_object($stdp_blocks)) {
            global $stdp_blocks;
            foreach ($stdp_blocks as $stdp_block) {
                acf_register_block_type(array(
                    'name' => $stdp_block['name'],
                    'title' => $stdp_block['title'],
                    'description' => $stdp_block['description'],
                    'keywords' => explode(' ', $stdp_block['description']),
                    'category' => $stdp_block['category'],
                    'render_callback' => 'stdp_block_render_callback',
                    'icon' => $stdp_block['icon'],
                    'mode' => 'edit',
                    'supports' => array('align' => false),
                ));
            }
        }
    }
}

/**
 * Create ITR block-category
 */

add_filter('block_categories', 'stdp_block_categories', 10, 2);
function stdp_block_categories($categories, $post)
{
    return array_merge(
        $categories,
        array(
            array(
                'slug' => 'itr-blocks',
                'title' => 'ITR Blocks',
            ),
        )
    );
}

/**
 * Create ITR block render callback
 */

function stdp_block_render_callback($block)
{
    $name = str_replace('acf/', '', $block['name']);
    if (file_exists(get_theme_file_path("/templates/blocks/{$name}.php"))) {
        include(get_theme_file_path("/templates/blocks/{$name}.php"));
    }
}

/**
 * Enable only ITR-blocks
 */

add_filter('allowed_block_types', 'allow_block_types');
function allow_block_types($allowed_block_types)
{
    $allowed_block_types = array();
    global $stdp_blocks;
    foreach ($stdp_blocks as $stdp_block) {
        array_push($allowed_block_types, 'acf/' . $stdp_block['name']);
    }

    return $allowed_block_types;
}
