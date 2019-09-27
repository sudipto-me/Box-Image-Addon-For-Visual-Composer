<?php
/*
Plugin Name: Box Addon For Visual Composer
Plugin URI: https://akismet.com/
Description: Box Addon For Visual Composer
Version: 1.0.0
Author: Mehedi Doha
Author URI: http://www.pixelomatic.com/
License: GPLv2 or later
Text Domain: box_addon
*/

include_once plugin_dir_path(__FILE__) . '/inc/shortcode.php';
include_once plugin_dir_path(__FILE__) . '/inc/vc-custom.php';
define('BOX_MAIN', plugins_url(__FILE__));
define('BOX_PATH', plugins_url('/img/', __FILE__));

function box_image_element_scripts()
{
  wp_enqueue_style('box_img_style', plugins_url('css/custom-style.css', __FILE__));
  wp_enqueue_script('box_img_script', plugins_url('js/custom-script.js', __FILE__), array('jquery'), '', true);
}
add_action('wp_enqueue_scripts', 'box_image_element_scripts');

if (!function_exists('vc_map_extract_string')) {
  function vc_map_extract_string($input)
  {
    $font_elements = explode('|', $input);
    $final_array =  array();
    foreach ($font_elements as $font_element) {
      if (!empty($font_element)) {
        $new_array = explode(':', $font_element);
        $final_array[$new_array[0]] = urldecode($new_array[1]);
      }
    }
    return $final_array;
  }
}
