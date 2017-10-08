<?php

require_once get_template_directory() . '/inc/shortcodes/helper-functions.php';

function alert_shortcode( $atts, $content = null ) {
  extract(shortcode_atts(array (
    'dismissible' => '',
    'class' => 'alert-primary',
  ),
  ($atts ? normalize_empty_atts($atts) : $atts)
  ));

  $alert_template = '<div role="alert" class="alert '
                    . esc_attr( $class )
                    . ( $dismissible ? ' alert-dismissible fade show">'
                    . '<button type="button" class="close" data-dismiss="alert" '
                    . 'aria-label="Close"><span aria-hidden="true">&times;</span>'
                    . '</button>' : '">' )
                    . do_shortcode(trim($content))
                    . '</div>';

  return $alert_template;
}
add_shortcode( 'alert', 'alert_shortcode' );

