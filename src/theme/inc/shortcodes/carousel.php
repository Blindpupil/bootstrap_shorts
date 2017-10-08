<?php

require_once get_template_directory() . '/inc/shortcodes/helper-functions.php';

function carousel_shortcode($atts, $content = null ) {
  extract(shortcode_atts(
    array(
      'id' => 'carouselExample',
      'indicators' => '',
      'arrows' => '',
      'style' => ''
    ),
    ($atts ? normalize_empty_atts($atts) : $atts)
  ));

  // carousel container div
  $block_id     = 'id="'. $id .'"';
  $block_inline = ($style ? 'style="'. $style .'"' : '');

  // carousel-inner
  $block_inner = '<div class="carousel-inner">'
               . do_shortcode(trim($content))
               . '</div>';

  $reg = get_shortcode_regex();
  preg_match_all('/'. $reg .'/s', $content, $matches);

  // carousel indicators
  $block_indicators = '<ol class="carousel-indicators">';
  $indicators_amount = count($matches[0]);

  for ($counter = 0; $counter < $indicators_amount; $counter++) {
    $block_indicators .= '<li data-target="#'. $id .'" data-slide-to="'
                      . $counter .'" '. ($counter == 0 ? ' class="active"' : '')
                      .'></li>';
  }
  $block_indicators .= '</ol>';

  // carousel arrows
  $block_arrows = '<a class="carousel-control-prev" href="#'. $id .'"' .'role="button" data-slide="prev">'
                . '<span class="carousel-control-prev-icon" aria-hidden="true"></span>'
                . '<span class="sr-only">Previous</span>'
                . '</a>'
                . '<a class="carousel-control-next" href="#'. $id .'" role="button" data-slide="next">'
                . '<span class="carousel-control-next-icon" aria-hidden="true"></span>'
                . '<span class="sr-only">Next</span>'
                . '</a>';

  $template = '<div '. $block_id .' '. $block_inline .' class="carousel slide" data-ride="carousel">'
            . ($indicators ? $block_indicators : '')
            . $block_inner
            . ($arrows ? $block_arrows : '')
            . '</div>';

  return $template;
}
add_shortcode( 'carousel', 'carousel_shortcode' );


function carousel_slide($atts, $content = '') {
  extract(shortcode_atts(
    array (
      'id'      => '',
      'class'   => '',
      'style'   => '',
      'src'     => 'https://via.placeholder.com/800x400?text=Your+Slide',
      'alt'     => '',
      'caption' => 'carousel-caption d-md-block'
    ),
    ($atts ? normalize_empty_atts($atts) : $atts)
  ));

  // carousel-item container div
  $block_id     = ($id ? 'id="'. $id .'"' : '');
  $block_class  = ($class ? 'class="carousel-item '. $class .'"' : 'class="carousel-item"');
  $block_inline = ($style ? 'style="'. $style .'"' : '');

  // image
  $block_src = ($src ? 'src="'. $src .'"' : '');
  $block_alt = ($alt ? 'alt="'. $alt .'"' : '');

  // caption
  $block_caption = 'class="'. $caption .'"';

  $template  = '<div '. $block_id .' '. $block_class .' '. $block_inline .'>'
             . '<img '. $block_src .' '. $block_alt .'>'
             . '<div '. $block_caption .'>'
             . do_shortcode(trim($content))
             . '</div></div>';

  return $template;
}

add_shortcode('carousel-slide', 'carousel_slide');
