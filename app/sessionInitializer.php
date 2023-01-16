<?php

session_start();

if ( !isset( $_SESSION ['user_data'] ['user_id'] ) && !isset( $_SESSION ['user_data'] ['username'] ) ) {

  header( 'Location: ./login.php' );
  exit();

}

?>