<?php
function box_image_section_shortcode_callback($atts, $content = NULL)
{
  ob_start();
  extract(shortcode_atts(array(
    'box_image' => '',
    'box_title' => __('Custom Title'),
    'box_title_color' => '#ffffff',
    'box_link'  => '',
  ), $atts));
  $id = uniqid('box-element-');
  $image_src = $title_fontsize = $title_fontcolor = $description_fontcolor = $box_background_color = $border_width = $border_color = $link = "";
  $image = wp_get_attachment_image_src($box_image, 'full');
  $image_src = !empty($image) ? $image['0'] : BOX_PATH . 'placeholder.jpg';

  if (isset($box_title_color) && !empty($box_title_color)) {
    $title_fontcolor = 'color:' . $box_title_color;
  }
  $box_link = vc_map_extract_string($box_link);
  if (is_array($box_link) && count($box_link)) {
    $link = $box_link['url'];
  }
  ?>
  <style>
    #<?php echo $id; ?>.box_element_wrapper .box_title {
      <?php echo $title_fontcolor; ?>;
    }
  </style>
  <div id="<?php echo $id; ?>" class="box_element_wrapper">
    <?php if (!empty($link)) : ?>
      <a href="<?php echo $link; ?>">
      <?php endif; ?>
      <div class="thumbnail_container">
        <img class="box-img" src="<?php echo $image_src; ?>" alt="expedition-image">
      </div>
      <div class="title_container">
        <h2 class="box_title"><?php echo $box_title; ?></h2>
      </div>
      <!-- ./box_title -->
      <?php if (!empty($link)) : ?>
      </a>
    <?php endif; ?>
  </div>
  <!-- ./box-wrapper -->
<?php
  return ob_get_clean();
}
add_shortcode('box_image_section_shortcode', 'box_image_section_shortcode_callback');
