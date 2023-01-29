<?php

session_start();

if ( ! isset( $_SESSION ['user_data'] ['user_id'] ) || ! isset( $_SESSION ['user_data'] ['username'] ) || ! isset( $_SESSION ['user_data'] ['admin'] ) ) {

  header( 'Location: ./login.php' );
  exit();

}

// Initialize Database Connection
require_once '../scripts/php/classes/database_config.php';
require_once '../scripts/php/classes/MySQLHandler.class.php';


$role = $_SESSION ['user_data'] ['admin'];

$page_name = explode( '/', $_SERVER['REQUEST_URI'] ) [3];

if ( ! $role && ( strpos( $page_name, 'Form' ) || strpos( $page_name, 'uestions' ) ) ) {

  header( 'Location: ./classifications.php' );
  exit;

}

?>