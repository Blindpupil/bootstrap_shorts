<?php

function modal_window($atts, $content = null ) {
  $a = shortcode_atts( array(
    'trigger-btn-text' => 'Set this text with the trigger-btn-text parameter',
    'trigger-btn-class' => 'btn-primary',
    'btn-data-target' => 'exampleModal',  //To be used later to call modal content dynamically
    'title-text' => 'Set this using the title-text parameter',
    'title-class' => '',
    'content-class' => '',
  ), $atts );

  $trigger_button = '<button type="button" class=" btn '
                    . esc_attr( $a[ 'trigger-btn-class' ] )
                    . '" data-toggle="modal" data-target="#'
                    . esc_attr( $a[ 'btn-data-target' ] ) . '">'
                    . $a[ 'trigger-btn-text' ]
                    . '</button>';

  $modal_container = '<div class="modal fade" id="'
                     . esc_attr( $a[ 'btn-data-target' ] )
                     . '" tabindex="-1" role="dialog" '
                     . 'aria-labelledby="exampleModalLabel" aria-hidden="true">'
                     . '<div class="modal-dialog" role="document">'
                     . '<div class="modal-content '
                     . esc_attr( $a[ 'content-class' ] )
                     . '">';

  $modal_header = '<div class="modal-header"><h5 class="modal-title '
                  . esc_attr( $a[ 'title-class' ] )
                  . '" id="exampleModalLabel">'
                  . $a[ 'title-text' ]
                  . '</h5> <button type="button" class="close" '
                  . ' data-dismiss="modal" aria-label="Close">'
                  . '<span aria-hidden="true">&times;</span></button></div>';

  $modal_content = '<div class="modal-body">'
                   . do_shortcode(trim($content))
                   . '</div>';

  $modal_footer = '<div class="modal-footer"><button type="button" '
                  . 'class="btn btn-secondary" data-dismiss="modal">Close'
                  . '</button></div>';

  $modal_template = $trigger_button . $modal_container . $modal_header
                    . $modal_content . $modal_footer
                    . '</div></div></div>';

  return $modal_template;
}
add_shortcode( 'modal', 'modal_window' );
