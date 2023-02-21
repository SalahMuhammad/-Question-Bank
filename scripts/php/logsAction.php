<?php

session_start();

if ( ! $_SESSION ['user_data'] ['admin'] ) header( 'Location: ../../app/login.php');

$_GET ['user_id'] = $_SESSION ['user_data'] ['user_id'];

if ( isset( $_GET ['e_id'], $_GET ['duration_by_secs'], $_GET ['percentage'], $_GET ['user_id'] ) ) {

  require_once './classes/database_config.php';
  require_once './classes/MySQLHandler.class.php';
  require_once './classes/logs.class.php';

  $logs = new Logs();

  $result = $logs -> insertLog( $_GET );
  exit;
}