<?php

/**
 * this function is to sanitize and clean given string from junk
 * 
 * @param str // string
 * 
 * @return string after cleaning
 */
function clean( $str ) {
  return trim( filter_var( $str, FILTER_SANITIZE_SPECIAL_CHARS ) );
}

function spacesToCamelCase( $string, $capitalizeFirstCharacter = false ) {
  $str = str_replace(' ', '', ucwords($string));

  if ( ! $capitalizeFirstCharacter ) {
    $str[0] = strtolower($str[0]);
  }

  return $str;
}