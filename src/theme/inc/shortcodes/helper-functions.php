<?php

// Helper function for empty attributes
function normalize_empty_atts ($atts) {
  foreach ($atts as $attribute => $value) {
    if (is_int($attribute)) {
        $atts[strtolower($value)] = true;
        unset($atts[$attribute]);
    }
  }
  return $atts;
}

// Push assoc arrays
function array_push_assoc($array, $key, $value) {
  $array[$key] = $value;
  return $array;
}
