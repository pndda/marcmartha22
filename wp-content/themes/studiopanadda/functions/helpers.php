<?php 

/*
 * Modify TinyMCE editor to remove H1.
 */

function tiny_mce_remove_unused_formats($init)
{
    // Add block format elements you want to show in dropdown
    $init['block_formats'] = 'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4;Heading 5=h5;Heading 6=h6;Address=address;Pre=pre';
    return $init;
}

add_filter('tiny_mce_before_init', 'tiny_mce_remove_unused_formats');


/*
 * Remove comments from backend menu
 */

add_action('admin_init', 'remove_admin_menus');
function remove_admin_menus()
{
    remove_menu_page('edit-comments.php');
}

add_action('wp_before_admin_bar_render', 'remove_comments_topbar');
function remove_comments_topbar()
{
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}

add_action('init', 'remove_comment_support', 100);
function remove_comment_support()
{
    remove_post_type_support('post', 'comments');
    remove_post_type_support('page', 'comments');
}