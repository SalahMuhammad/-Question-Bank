<?php

require_once './myFunctions.php';

require_once './classes/database_config.php';
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

  $classifications = null;
  header( 'Location: ../../app/classifications.php?status=' . $result );
  exit;

}

$classifications = null;
header( 'Location: ../../app/classifications.php' );
exit;