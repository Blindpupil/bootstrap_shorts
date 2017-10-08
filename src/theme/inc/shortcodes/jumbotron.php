<?php

require_once get_template_directory() . '/inc/shortcodes/helper-functions.php';

function jumbotron_shortcode( $atts, $content = null ) {
  extract(shortcode_atts(array (
    'fluid' => '',
    'style' => ''
  ),
    ($atts ? normalize_empty_atts($atts) : $atts)
  ));

  $block_fluid = ( $fluid ? ' jumbotron-fluid ' : '');
  $block_style = ( $style ? 'style="' . $style . '"' : '');

  $jumbotron_template = '<div class="jumbotron' . $block_fluid . '"'
    . $block_style . '>'
    . do_shortcode(trim($content))
    . '</div>';

  return $jumbotron_template;
}
add_shortcode( 'jumbotron', 'jumbotron_shortcode' );
