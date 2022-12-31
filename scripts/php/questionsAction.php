<?php

if ( $_SERVER['QUERY_STRING'] ) {

  require_once './myFunctions.php';

  require_once './classes/databaseHandler.class.php';
  require_once './classes/crud/questions.class.php';

  $handler  = new Questions();

  if ( isset( $_GET ['submit'] ) ) {

    $regexp   = '/\r\n|\n|\r/';
    $alt      = '\r\n';

    @$q_id      = clean( $_GET ['q_id'] );
    $question   = clean( $_GET ['q'] );
    $selections = clean( $_GET ['s'] );
    $answer     = clean( $_GET ['an'] );
    $e_id       = clean( $_GET ['e_id']) ;

    $question   = implode( $alt, preg_split( $regexp, $question ) );
    $selections = implode( $alt, preg_split( $regexp, $selections ) );
    $answer     = implode( $alt, preg_split( $regexp, $answer ) );

    if ( $_GET ['submit'] == 'Save' ) {
      // insert
      // php_eol => end of line
      $result = $handler -> insert( $question, $selections, $answer, $e_id );

      header( 'Location: ../../app/questionsForm.php?status=' . $result );
      exit;

    } else if ( $_GET ['submit'] == 'Update' ) {
      // upadte
      $result = $handler -> update( $q_id, $question, $selections, $answer, $e_id );

      header( 'Location: ../../app/questions.php?status=' . $result );
      exit;

    }

  } else if ( isset( $_GET ['q_id'] ) ) {
      // delete
      $result = $handler -> delete( $_GET ['q_id'] );

      header( 'Location: ../../app/questions.php?&status=' . $result );
      exit;

  }

  $handler = null;

  header( 'Location: ../../app/questions.php' );
  exit;

} else {

  header( 'Location: ../../app/questions.php' );
  exit;

}
