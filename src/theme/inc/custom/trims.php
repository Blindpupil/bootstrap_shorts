<?php

function excerpt($chars) {
  $limit = $chars + 1;
  $excerpt = explode(' ', get_the_excerpt(), $limit); array_pop($excerpt);
  $excerpt  = implode(' ', $excerpt);
  echo $excerpt . '...&nbsp;';
}

function change_mce_options($init){
  $init["forced_root_block"] = false;
  $init["force_br_newlines"] = false;
  $init["force_p_newlines"] = false;
  $init["convert_newlines_to_brs"] = false;
  return $init;
}
add_filter('tiny_mce_before_init','change_mce_options');

function shortcode_empty_paragraph_fix( $content ) {

  // define your shortcodes to filter, '' filters all shortcodes
  $shortcodes = array( '' );

  foreach ( $shortcodes as $shortcode ) {

    $array = array (
      '<p>[' . $shortcode => '[' .$shortcode,
      '<p>[/' . $shortcode => '[/' .$shortcode,
      $shortcode . ']</p>' => $shortcode . ']',
      $shortcode . ']<br />' => $shortcode . ']'
    );

    $content = strtr( $content, $array );
  }

  return $content;
}
add_filter( 'the_content', 'shortcode_empty_paragraph_fix' );
