<?php

class Exams extends MySQLHandler {

	private $_table = 'exams';

	public function __construct() {

		global $config;

		parent::__construct( $config );

	}

	public function getRow( $e_id ) {

		$this -> select( $this -> _table, "e_id = $e_id", "e_name, timer, c_id" );

		return $this -> fetch();

	}

	public function getAll( $c_id ) {

		$this -> select( $this -> _table, "c_id = $c_id", "*", "e_id DESC");

		return $this -> fetchAll();

	}

	public function insertE( array $data ) {

		try {

			return $this -> insert( $this -> _table, $data );

		} catch ( mysqli_sql_exception $e ) {

			return 'Failed To Insert: ' . $e -> getMessage();

		}

	}

	public function updateE( array $data, $e_id ) {

		try {

			return $this -> update( $this -> _table, $data, "e_id = $e_id" );

		} catch ( mysqli_sql_exception $e ) {

			return 'Failed To Update: ' . $e -> getMessage();

		}

	}

	public function deleteE( $e_id ) {

		try {

			return $this -> delete( $this -> _table, "e_id = $e_id" );

		} catch ( mysqli_sql_exception $e ) {

			return 'Failed To Delete: ' . $e -> getMessage();

		}

	}

}