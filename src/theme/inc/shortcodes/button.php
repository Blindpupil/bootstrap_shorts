<?php

function button_shortcode( $atts, $content = null ) {
  $a = shortcode_atts( array(
    'class' => 'btn-primary'
  ), $atts );

  $button_template = '<button type="button" class="btn '
                     . esc_attr( $a[ 'class' ] )
                     . '">'
                     . do_shortcode(trim($content))
                     . '</button>';

  return $button_template;
}
add_shortcode( 'button', 'button_shortcode' );