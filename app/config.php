<?php

session_start();

if ( ! isset( $_SESSION ['user_data'] ['user_id'] ) || ! isset( $_SESSION ['user_data'] ['username'] ) || ! isset( $_SESSION ['user_data'] ['admin'] ) ) {

  header( 'Location: ./login.php' );
  exit();

}

// Initialize Database Connection
require_once '../scripts/php/classes/database_config.php';
require_once '../scripts/php/classes/MySQLHandler.class.php';
?>