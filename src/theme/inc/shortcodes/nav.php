<?php

require_once get_template_directory() . '/inc/shortcodes/helper-functions.php';

function nav_shortcode( $atts ) {
  extract(shortcode_atts(
    array (
      'id'      => '',
      'class'   => '',
      'anchors' => '',
      'style'   => ''
    ),
    ($atts ? normalize_empty_atts($atts) : $atts)
  ));

  $block_id    = ($id ? 'id="'. $id .'"' : '');
  $block_class = ($class ? 'class="nav '. $class .'"' : 'class="nav"');
  $block_style = ($style ? 'style="'. $style .'"' : '');

  $nav_container = '<ul '. $block_id .' '. $block_class .' '. $block_style . 'role="tablist"' . '>';

  //li block
  $anchors = json_decode($anchors);
  $anchors_array = (array) $anchors;
  $anchor_items = '';

  $counter = 0;
  foreach ($anchors_array as $text => $href) {
    $anchor_items .= '<li class="nav-item">'
                  . '<a class="nav-link'
                  . ($counter == 0 ? ' active" ' : '" ' )
                  . 'id="'. $href .'-tab"'
                  . 'data-toggle="tab"'
                  . 'href="#'. $href .'"'
                  . 'role="tab"'
                  . 'aria-controls="'. $href. '"'
                  . 'href="'. $href .'">'. $text .'</a>';
    $counter++;
  }

  $nav_template = $nav_container . $anchor_items . '</ul>';

  return $nav_template;
}
add_shortcode( 'nav', 'nav_shortcode' );

function nav_content_container_shortcode( $atts, $content='') {
  extract(shortcode_atts(
    array (
      'id'      => '',
      'class'   => '',
      'style'   => ''
    ),
    ($atts ? normalize_empty_atts($atts) : $atts)
  ));

  $block_id    = ($id ? 'id="'. $id .'"' : '');
  $block_class = ($class ? 'class="tab-content '. $class .'"' : 'class="tab-content"');
  $block_style = ($style ? 'style="'. $style .'"' : '');

  $nav_content_template = '<div '. $block_id .' '. $block_class .' '. $block_style . '>'
                         . do_shortcode($content)
                         . '</div>';

  return $nav_content_template;
}
add_shortcode( 'nav-content-container', 'nav_content_container_shortcode' );

function nav_content_shortcode( $atts, $content='') {
  extract(shortcode_atts(
    array (
      'id'    => '',
      'class' => '',
      'style' => ''
    ),
    ($atts ? normalize_empty_atts($atts) : $atts)
  ));

  $block_id    = ($id ? 'id="'. $id .'"' : '');
  $block_class = ($class ? 'class="tab-pane '. $class .'"' : 'class="tab-pane"');
  $block_style = ($style ? 'style="'. $style .'"' : '');

  $nav_content_template = '<div '. $block_id .' '. $block_class .' '. $block_style
                        .'role="tabpanel" aria-labelledby="'. $id .'-tab" >'
                        . do_shortcode($content)
                        . '</div>';

  return $nav_content_template;
}
add_shortcode( 'nav-content', 'nav_content_shortcode' );
