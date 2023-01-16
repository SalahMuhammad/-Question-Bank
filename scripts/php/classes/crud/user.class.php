<?php

Class User extends MySQLHandler {
	private $_table = 'users';

	public function __construct() {
    global $config;

    parent::__construct( $config );
  }

	public function getUser( $username, $password ) {
    $this -> select( $this -> _table, "username = '$username' AND password = '$password'", "user_id, username" );

    return $this -> fetch();
  }

}