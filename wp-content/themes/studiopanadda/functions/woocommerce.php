<?php

/*
 * Setup global Woocommerce container
 */

remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'studiopanadda_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'studiopanadda_wrapper_end', 10);

function studiopanadda_wrapper_start()
{
    echo '<section class="c-woocommerce"><div class="container">';
}

function studiopanadda_wrapper_end()
{
    echo '</div></section>';
}


/*
 * Add theme support for Woocommerce
 */

add_action('after_setup_theme', 'woocommerce_support');

function woocommerce_support()
{
    add_theme_support('woocommerce');
}

/*
 * Add Excerpt to product overview page
 */

function add_excerpt_to_overview()
{
    $excerpt = get_the_excerpt();
    echo '<span class="short-description">' . wp_trim_words($excerpt, 10) . '</span>';
}

add_action('woocommerce_after_shop_loop_item_title', 'add_excerpt_to_overview', 40);


/*
 * Remove default Woocommerce stylesheet
 */

add_filter('woocommerce_enqueue_styles', '__return_empty_array');


remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
/*
 * Uncheck ship to different address
 */

add_filter('woocommerce_ship_to_different_address_checked', '__return_false');

/*
 * Enabling support for WooCommerce jQuery Slider
 */

add_theme_support('wc-product-gallery-zoom');
add_theme_support('wc-product-gallery-slider');


/*
 * Remove Woocommerce breadcrumbs
 */

add_action('init', 'woo_remove_wc_breadcrumbs');
function woo_remove_wc_breadcrumbs()
{
    remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
}





add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
// remove desciption heading 

add_filter( 'woocommerce_product_description_heading', '__return_null' );


// add wrapper before summary 
// add_action('woocommerce_before_single_product_summary', 'studiopanadda_wrapper_content_start', 5);
// add_action('woocommerce_after_single_product_summary', 'studiopanadda_wrapper_content_end', 5);

// function studiopanadda_wrapper_content_start()
// {
//     echo '<div class="c-single-content">';
// }

// function studiopanadda_wrapper_content_end()
// {
//     echo '</div>';
// }


 // Remove additional information tab
 add_filter( 'woocommerce_product_tabs', 'remove_additional_information_tab', 100, 1 );
 function remove_additional_information_tab( $tabs ) {
     unset($tabs['additional_information']);
 
     return $tabs;
 }
 
 // Add "additional information" after add to cart
 add_action( 'woocommerce_single_product_summary', 'additional_info_under_add_to_cart', 35 );
 function additional_info_under_add_to_cart() {
     global $product;
 
     if ( $product && ( $product->has_attributes() || apply_filters( 'wc_product_enable_dimensions_display', $product->has_weight() || $product->has_dimensions() ) ) ) {
         wc_display_product_attributes( $product );
     }
 }


 //Remove WooCommerce Tabs - this code removes all 3 tabs - to be more specific just remove actual unset lines 

add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function woo_remove_product_tabs( $tabs ) {

    unset( $tabs['description'] );      	// Remove the description tab
    unset( $tabs['reviews'] ); 			// Remove the reviews tab
    // unset( $tabs['additional_information'] );  	// Remove the additional information tab

    return $tabs;

}

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
add_action( 'woocommerce_single_product_summary', 'ta_the_content' );

function ta_the_content() {
        echo the_content();
}


/**
 * Remove related products output
 */
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
