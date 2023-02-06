<?php

class Questions extends MySQLHandler {

	private $_table = 'questions';

	public function __construct() {
		global $config;

		parent::__construct( $config );
	}

	public function getRow( $q_id ) {
		$this -> select( $this -> _table, "q_id = $q_id", "question, selections, answer, e_id" );

		return $this -> fetch();
	}

	public function getSpecificColumns( $e_id ) {
		$this -> select( $this -> _table, "e_id = $e_id", "question, answer", "q_id DESC" );

		return $this -> fetchAll();
	}

	public function getAll( $e_id ) {
		$this -> select( $this -> _table, "e_id = $e_id", "*", "q_id DESC");

		return $this -> fetchAll();
	}

	public function insertQ( array $data ) {
		try {

			return $this -> insert( $this -> _table, $data );

		} catch ( mysqli_sql_exception $e ) {

			return 'Failed To Insert: ' . $e -> getMessage();

		}
	}

	public function updateQ( array $data, $q_id ) {
		try {

			return $this -> update( $this -> _table, $data, "q_id = $q_id" );

		} catch ( mysqli_sql_exception $e ) {

			return 'Failed To Update: ' . $e -> getMessage();

		}
	}

	public function deleteQ( $q_id ) {
		try {

			return $this -> delete( $this -> _table, "q_id = $q_id" );

		} catch ( mysqli_sql_exception $e ) {

			return 'Failed To Delete: ' . $e -> getMessage();

		}
	}

}