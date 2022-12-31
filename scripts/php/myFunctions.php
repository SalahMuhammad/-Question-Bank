<?php

/**
 * this function is to sanitize and clean given string from junk
 * 
 * @param str // string
 * 
 * @return string after cleaning
 */
function clean( $str ) {
  return trim( filter_var( $str, FILTER_SANITIZE_STRING ) );
}