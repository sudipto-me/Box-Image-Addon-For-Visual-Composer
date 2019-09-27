<?php
function box_image_section_addon_callback()
{
  vc_map(array(
    "name" => __("Image Box Element", "onelife"),
    "base" => "box_image_section_shortcode",
    "show_settings_on_create" => true,
    "category" => array('Content'),
    'params'  => array(
      array(
        'type' => 'attach_image',
        'heading' => __('Box Image', 'onelife'),
        'param_name' => 'box_image',
      ),
      array(
        'type' => 'textarea',
        'heading' => esc_html__('Box Title', 'onelife'),
        'param_name' => 'box_title',
        'admin_label' => false,
        'value' => esc_html__('Custom Title', 'onelife'),
        'description' => esc_html__('Note: If you are using non-latin characters be sure to activate them under Settings/WPBakery Page Builder/General Settings.', 'onelife'),
      ),
      array(
        'type' => 'vc_link',
        'heading' => esc_html__('Box Link', 'onelife'),
        'param_name' => 'box_link',
        'admin_label' => false,
      ),
      array(
        'type' => 'colorpicker',
        'heading' => esc_html__('Box title color', 'onelife'),
        'param_name' => 'box_title_color',
        'description' => esc_html__('Select box title color.', 'onelife'),
        'std' => "#ffffff",
      ),
    )
  ));
}
add_action('vc_before_init', 'box_image_section_addon_callback');
