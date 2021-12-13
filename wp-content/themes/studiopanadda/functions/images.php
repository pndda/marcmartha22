<?php

/*
 * Define image sizes default images
 */

update_option('thumbnail_size_w', 400);
update_option('thumbnail_size_h', 225);

update_option('medium_size_w', 800);
update_option('medium_size_h', 450);

update_option('large_size_w', 1600);
update_option('large_size_h', 900);


/*
 * Define extra image sizes
 */

add_image_size('thumbnail', 400, 225, array('center', 'center'));
add_image_size('medium', 800, 450, array('center', 'center'));
add_image_size('large', 1600, 900, array('center', 'center'));

// Custom image sizes
add_image_size('hero', 1600, 650, array('center', 'center'));
add_image_size('square', 450, 450, array('center', 'center'));
add_image_size('mail', 600, 9999, false); // 600 width, unlimited height

add_image_size('logo', 150, 50, false);


/*
 * Resize smaller images
 */

if (!function_exists('thumbnail_upscale')) {
    function thumbnail_upscale($default, $orig_w, $orig_h, $new_w, $new_h, $crop)
    {
        if (!$crop) return null; // let the wordpress default function handle this
        $aspect_ratio = $orig_w / $orig_h;
        $size_ratio = max($new_w / $orig_w, $new_h / $orig_h);

        $crop_w = round($new_w / $size_ratio);
        $crop_h = round($new_h / $size_ratio);

        $s_x = floor(($orig_w - $crop_w) / 2);
        $s_y = floor(($orig_h - $crop_h) / 2);

        return array(0, 0, (int)$s_x, (int)$s_y, (int)$new_w, (int)$new_h, (int)$crop_w, (int)$crop_h);
    }
}
add_filter('image_resize_dimensions', 'thumbnail_upscale', 10, 6);

/*
 * Image upload quality check
 */

add_filter('wp_handle_upload_prefilter', 'validate_images');

function validate_images($file)
{

    // Check if upload is image, if so apply validation
    if (preg_match("/\.(gif|png|jpg)$/", $file['name'])) {

        $image = getimagesize($file['tmp_name']);
        $filesize = filesize($file['tmp_name']);
        $size = round($filesize / 1024 / 1024, 1);

        $minimum = array(
            'width' => '10',
            'height' => '10'
        );
        $maximum = array(
            'width' => '1920',
            'height' => '2500'
        );

        $image_width = $image[0];
        $image_height = $image[1];
        $image_size = 1;

        $too_small = "Image dimensions are too small. Minimum size is {$minimum['width']} by {$minimum['height']} pixels. Uploaded image is $image_width by $image_height pixels.";
        $too_large = "Image dimensions are too large. Maximum size is {$maximum['width']} by {$maximum['height']} pixels. Uploaded image is $image_width by $image_height pixels.";
        $too_big = "Image size is to big. Maximum size is 1 MB. Uploaded size is $size MB";

        if ($image_width < $minimum['width'] || $image_height < $minimum['height']) {
            if ($size > 4) {
                $file['error'] = $too_small . $too_big;
                return $file;
            } else {
                $file['error'] = $too_small;
                return $file;
            }
        } elseif ($image_width > $maximum['width'] || $image_height > $maximum['height']) {
            if ($size > 4) {
                $file['error'] = $too_large . $too_big;
                return $file;
            } else {
                $file['error'] = $too_large;
                return $file;
            }
        } else
            return $file;

    } else {
        return $file;
    }
}

//add SVG to allowed file uploads
function add_file_types_to_uploads($file_types){
  $new_filetypes = array();
  $new_filetypes['svg'] = 'image/svg';
  $file_types = array_merge($file_types, $new_filetypes );
  return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');
