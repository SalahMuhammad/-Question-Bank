<?php

class Classifications extends MySQLHandler {
	
	private $_table = 'classifications';

	public function __construct() {

    global $config;

    parent::__construct( $config );

  }

	public function getRow( $id ) {

    $this -> select( $this -> _table, "c_id = $id", "c_name" );

    return $this -> fetch();

  }

	public function getAll() {

    $this -> select( $this -> _table, "", "*", "c_id DESC");

    return $this -> fetchAll();

  }

	public function insertC( array $data ) {

		try {

			return $this -> insert( $this -> _table, $data );

		} catch ( mysqli_sql_exception $e ) {

			return 'Failed To Insert: ' . $e -> getMessage();

		}

	}

	public function updateC( array $data, $c_id ) {

		try {

			return $this -> update( $this -> _table, $data, "c_id = $c_id" );

		} catch ( mysqli_sql_exception $e ) {

			return 'Failed To Update: ' . $e -> getMessage();

		}

	}

	public function deleteC( $c_id ) {

		try {

			return $this -> delete( $this -> _table, "c_id = $c_id" );

		} catch ( mysqli_sql_exception $e ) {

			return 'Failed To Delete: ' . $e -> getMessage();

		}

	}

}