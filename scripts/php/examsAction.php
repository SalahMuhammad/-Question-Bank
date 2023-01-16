<?php

if ( $_SERVER['QUERY_STRING'] ) {

  require_once './myFunctions.php';

  require_once './classes/databaseHandler.class.php';
  require_once './classes/crud/exams.class.php';

  $handler  = new Exams();

  if ( isset( $_GET ['submit'] ) ) {

    @$e_id  = clean ( $_GET ['e_id'] );
    $c_id   = clean( $_GET ['c_id'] );
    $e_name = clean( $_GET ['e_name'] );
    $timer  = clean( $_GET ['timer'] );

    if ( $_GET ['submit'] == 'Save' ) {
      // insert
      $result = $handler -> insert( $e_name, $timer, $c_id );

      header( 'Location: ../../app/examsForm.php?status=' . $result );
      exit;

    } else if ( $_GET ['submit'] == 'Update' ) {
      // upadte
      $result = $handler -> update( $e_id, $e_name, $timer, $c_id );

      header( 'Location: ../../app/exams.php?status=' . $result );
      exit;

    }

  } else if ( isset( $_GET ['e_id'] ) ) {
      // delete
      $result = $handler -> delete( $_GET ['e_id'] );

      header( 'Location: ../../app/exams.php?status=' . $result );
      exit;

  }

  $handler = null;

  header( 'Location: ../../app/exams.php' );
  exit;

} else {

  header( 'Location: ../../app/exams.php' );
  exit;

}

// <?php
require_once './myFunctions.php';

require_once './database_config.php';
require_once './classes/MySQLHandler.class.php';
require_once './classes/crud/classifications.class.php';

$classifications  = new Classifications();
$result = '';

if ( isset( $_GET ['submit'] ) ) {

  $c_id   = isset( $_GET ['c_id'] )   ? clean( $_GET ['c_id'] )   : null;
  $c_name = isset( $_GET ['c_name'] ) ? clean( $_GET ['c_name'] ) : null;

  switch ( $_GET ['submit'] ) {
    case 'Save':
      $result = $classifications -> insertC( array( "c_id" => null, "c_name" => $c_name ) );
      break;

    case 'Update':
      $result = $classifications -> updateC( array( "c_name" => $c_name ), $c_id );
      break;

    case 'Delete':
      $result = $classifications -> deleteC( $c_id );
      break;
  }

  header( 'Location: ../../app/classifications.php?status=' . $result );
  exit;

}

$classifications = null;
header( 'Location: ../../app/classifications.php' );
exit;