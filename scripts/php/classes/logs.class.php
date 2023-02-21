<?php

class Logs extends MySQLHandler {
	
	private $_table = 'logs';

	public function __construct() {

    global $config;

    parent::__construct( $config );

  }

	public function getAll( $whereClause ) {

    $this -> select( $this -> _table . " INNER JOIN exams ON exams.e_id = logs.e_id ", $whereClause, "logs.date, logs.duration_by_secs, logs.percentage", 'logs.date desc' );

    return $this -> fetchAll();

  }

	public function insertLog( array $data ) {

		try {

			return $this -> insert( $this -> _table, $data );

		} catch ( mysqli_sql_exception $e ) {

			return 'Failed To Insert: ' . $e -> getMessage();

		}

	}

}