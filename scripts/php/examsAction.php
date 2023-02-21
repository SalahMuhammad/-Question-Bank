<?php

session_start();

if ( ! $_SESSION ['user_data'] ['admin'] ) header( 'Location: ../../app/login.php');

require_once './myFunctions.php';

require_once './classes/database_config.php';
require_once './classes/MySQLHandler.class.php';
require_once './classes/crud/exams.class.php';

$exam  = new Exams();
$result = '';

if ( isset( $_GET ['submit'] ) ) {

  $e_id   = isset( $_GET ['e_id'] )   ? clean( $_GET ['e_id'] )      : null;
  $e_name = isset( $_GET ['e_name'] ) ? clean( $_GET ['e_name'] )    : null;
  $secs   = isset( $_GET ['time'] )   ? clean( $_GET ['time'] * 60 ) : null;
  $c_id   = isset( $_GET ['c_id'] )   ? clean( $_GET ['c_id'] )      : null;

  switch ( $_GET ['submit'] ) {
    case 'Save':
      $result = $exam -> insertE( array( "e_id" => null, "e_name" => $e_name, "secs" => $secs, "c_id" => $c_id ) );
      break;

    case 'Update':
      $result = $exam -> updateE( array( "e_name" => $e_name, "secs" => $secs, "c_id" => $c_id ), $e_id );
      break;

    case 'Delete':
      $result = $exam -> deleteE( $e_id );
      break;
  }

  $exam = null;
  header( 'Location: ../../app/exams.php?status=' . $result );
  exit;

}

$exam = null;
header( 'Location: ../../app/exams.php' );
exit;