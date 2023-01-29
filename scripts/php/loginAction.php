<?php

require_once './myFunctions.php';

require_once './classes/database_config.php';
require_once './classes/MySQLHandler.class.php';
require_once './classes/crud/user.class.php';

$username = isset( $_POST ['username'] ) ? clean( $_POST ['username'] ) : null;
$password = isset( $_POST ['password'] ) ? clean( $_POST ['password'] ) : null;

if ( isset( $_POST ['submit'] ) && $username && $password ) {

  $user = new User();

  $row = $user -> getUser( $username, sha1( $password ) );

  $user = null;

  if ( gettype( $row ) == 'array' && !empty( $row ) ) {

    session_start();

    $_SESSION ['user_data'] ['user_id']   = $row ['user_id'];
    $_SESSION ['user_data'] ['username']  = $row ['username'];
    $_SESSION ['user_data'] ['admin']     = $row ['admin'];

    header( 'Location: ../../index.html');
    exit();

  } else {

    header( 'Location: ../../app/login.php?status=Login Failed: Invalid Inputs');
    exit();

  }

}

header( 'Location: ../../app/login.php');
exit();