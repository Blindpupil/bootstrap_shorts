<?php


function display_block($attrs, $content = '') {
  $block_id     = isset($attrs['id']) ? 'id="'. $attrs['id'] .'"' : '';
  $block_class  = isset($attrs['class']) ? 'class="d-block '. $attrs['class'] .'"': 'class="d-block"';
  $block_inline = isset($attrs['style']) ? 'style="'. $attrs['style'] .'"' : '';
  $pattern = "/<p[^>]*>[\s|&nbsp;]*<\/p>/";

  $template  = '<div '. $block_id .' ' . $block_class .' '. $block_inline .'>';
  $template .= do_shortcode(trim(preg_replace($pattern, '', $content)));
  $template .= '</div>';
  return $template;
}

add_shortcode('d-block', 'display_block');

function container_block($attrs, $content = '') {
  $block_id = isset($attrs['id']) ? 'id="'. $attrs['id'] .'"' : '';
  $block_class = isset($attrs['class']) ? 'class="container '. $attrs['class'] .'"': 'class="container"';
  $block_inline = isset($attrs['style']) ? 'style="'. $attrs['style'] .'"' : '';
  $pattern = "/<p[^>]*>[\s|&nbsp;]*<\/p>/";

  $template  = '<div '. $block_id .' ' . $block_class .' '. $block_inline .'>';
  $template .= do_shortcode(trim(preg_replace($pattern, '', $content)));
  $template .= '</div>';
  return $template;
}

add_shortcode('container', 'container_block');

function flex_block($attrs, $content = '') {
  $block_id = isset($attrs['id']) ? 'id="'. $attrs['id'] .'"' : '';
  $block_class = isset($attrs['class']) ? 'class="d-flex '. $attrs['class'] .'"': 'class="d-flex"';
  $block_inline = isset($attrs['style']) ? 'style="'. $attrs['style'] .'"' : '';
  $pattern = "/<p[^>]*>[\s|&nbsp;]*<\/p>/";

  $template  = '<div '. $block_id .' ' . $block_class .' '. $block_inline .'>';
  $template .= do_shortcode(trim(preg_replace($pattern, '', $content)));
  $template .= '</div>';
  return $template;
}

add_shortcode('d-flex', 'flex_block');

function row_block($attrs, $content = '') {
  $block_id = isset($attrs['id']) ? 'id="'. $attrs['id'] .'"' : '';
  $block_class = isset($attrs['class']) ? 'class="row '. $attrs['class'] .'"': 'class="row"';
  $block_inline = isset($attrs['style']) ? 'style="'. $attrs['style'] .'"' : '';
  $pattern = "/<p[^>]*>[\s|&nbsp;]*<\/p>/";

  $template  = '<div '. $block_id .' ' . $block_class .' '. $block_inline .'>';
  $template .= do_shortcode(trim(preg_replace($pattern, '', $content)));
  $template .= '</div>';
  return $template;
}

add_shortcode('row', 'row_block');
