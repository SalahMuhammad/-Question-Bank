<?php

if ( $_SERVER['QUERY_STRING'] ) {

  require_once './myFunctions.php';

  require_once './classes/databaseHandler.class.php';
  require_once './classes/crud/classifications.class.php';

  $handler  = new Classifications();

  if ( !isset( $_GET ['c_id'] ) && isset( $_GET ['c_name'] ) ) {
    // insert
    $result = $handler -> insert( clean( $_GET ['c_name'] ) );
    header( 'Location: ../../app/classificationsForm.php?status=' . $result );
    exit;

  } else if ( isset( $_GET ['c_id'] ) ) {
    
    if ( isset( $_GET ['c_name'] ) ) { 
      // upadte
      $result = $handler -> update( $_GET ['c_id'], clean( $_GET ['c_name'] ) );
      header( 'Location: ../../app/classifications.php?status=' . $result );
      exit;
    
    } else { 
      // delete
      $result = $handler -> delete( $_GET ['c_id'] );
      header( 'Location: ../../app/classifications.php?status=' . $result );
      exit;

    }
  }

  $handler = null;

  header( 'Location: ../../app/classifications.php' );
  exit;

} else {

  header( 'Location: ../../app/classifications.php' );
  exit;

}