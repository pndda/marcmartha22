<?php 


function studiopanadda_scripts() {
    // wp_enqueue_style( 'bootstrap', '//cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css'); 
    wp_enqueue_style( 'swiper-css', get_template_directory_uri() . '/dist/css/main.css', array(), time());  
    wp_enqueue_style( 'style', get_stylesheet_uri() );
   

    // Include CSS file to header with cache buster
    $cacheBuster = filemtime(get_template_directory() . '/dist/css/main.css');
    wp_enqueue_style('main.css', get_template_directory_uri() . '/dist/css/main.css', array(), $cacheBuster, null);

    // Remove default jQuery (to remove it from header)
    wp_deregister_script('jquery');

    // Include default jQuery (and put it in footer)
    wp_register_script('jquery', includes_url('/js/jquery/jquery.js'));
    wp_enqueue_script('jquery', '', '', '', true);

    // Remove Gutenberg blocks CSS
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wc-block-style' ); // Remove WooCommerce block CSS

    // Include all js-files from all folder
    // wp_enqueue_script('all.js', get_stylesheet_directory_uri() . '/dist/js/all.js', array(), null, true);

    // Include main.js file te footer with cache buster
    $cacheBuster = filemtime(get_template_directory() . '/dist/js/main.js');
    wp_enqueue_script('scripts.js', get_template_directory_uri() . '/dist/js/main.js', array(), $cacheBuster, true);

    // Add php vars to scripts.js => vars['ajaxurl']
    $vars = array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'templateurl' => get_stylesheet_directory_uri(),
        'siteurl' => get_site_url()
    );
    wp_localize_script('scripts.js', 'vars', $vars);

   }
   add_action( 'wp_enqueue_scripts', 'studiopanadda_scripts' );
   

// add favicon
function my_favicon() { ?>
<link rel="shortcut icon" href="/wp-content/themes/studiopanadda/logo.ico">
<?php }
    add_action('wp_head', 'my_favicon');
    
/*  add svg  */

// function add_file_types_to_uploads($file_types){
//     $new_filetypes = array();
//     $new_filetypes['svg'] = 'image/svg';
//     $file_types = array_merge($file_types, $new_filetypes );
//     return $file_types;
//     }
//     add_filter('upload_mimes', 'add_file_types_to_uploads');


    //Page Slug Body Class
function add_slug_body_class( $classes ) {
    global $post;
    if ( isset( $post ) ) {
    $classes[] = $post->post_type . '-' . $post->post_name;
    }
    return $classes;
    }
    add_filter( 'body_class', 'add_slug_body_class' );