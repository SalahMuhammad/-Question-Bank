<?php

class Exams extends DatabaseHandler {

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

	public function getAll( $c_id ) {
		try {
			$query	= 'SELECT e_id, e_name, timer FROM exams WHERE c_id = ? ORDER BY e_id DESC';
			
			$stmt	= $this -> con -> prepare( $query );
			$stmt -> bind_param( 'i', $c_id );
			$stmt -> execute();

			return $stmt -> get_result() -> fetch_all();

		} catch( Exception $e ) {
			echo 'Failed To Load Data: ' . $e -> getMessage();
		}

		return [];
	}

	public function insert( $e_name, $timer, $c_id ) {
		try {
			$query	= 'INSERT INTO exams VALUES ( null, ?, ?, ? )';
			
			$stmt	= $this -> con -> prepare( $query );
			$stmt -> bind_param( 'sdi', $e_name, $timer, $c_id );
			$stmt -> execute();

			return  'Exam Inserted Successfully...';

		} catch( Exception $e ) {
			return 'Failed To Insert: ' . $e -> getMessage();
		}
	}

	public function update( $e_id, $e_name, $timer, $c_id ) {
		try {
			$query 	= 'UPDATE exams SET e_name = ?, timer = ?, c_id = ? WHERE e_id = ?';

			$stmt	= $this -> con -> prepare( $query );
			$stmt -> bind_param( 'sdii', $e_name, $timer, $c_id, $e_id );
			$stmt -> execute();

			return  'Exam Updated Successfully...';

		} catch( Exception $e ) {
			return 'Failed To Update: ' . $e -> getMessage();
		}
	}

	public function delete( $e_id ) {
		try {
			$query	= 'DELETE FROM exams WHERE e_id = ?';

			$stmt 	= $this -> con -> prepare( $query );
			$stmt -> bind_param( 'i', $e_id );
			$stmt -> execute();

			return 'Exam Deleted Successfully...';

		} catch( Exception $e ) {
			return 'Failed To Delete: ' . $e -> getMessage();
		}
	}
}

// <?php

// class Classifications extends MySQLHandler {
	
// 	private $_table = 'exams';

// 	public function __construct() {

//     global $config;

//     parent::__construct( $config );

//   }

// 	public function getRow( $id ) {

//     $this -> select( $this -> _table, "c_id = $id", "c_name" );

//     return $this -> fetch();

//   }

// 	public function getAll() {

//     $this -> select( $this -> _table, "", "*", "c_id DESC");

//     return $this -> fetchAll();

//   }

// 	public function insertC( array $data ) {

// 		try {

// 			return $this -> insert( $this -> _table, $data );

// 		} catch ( mysqli_sql_exception $e ) {

// 			return 'Failed To Insert: ' . $e -> getMessage();

// 		}

// 	}

// 	public function updateC( array $data, $c_id ) {

// 		try {

// 			return $this -> update( $this -> _table, $data, "c_id = $c_id" );

// 		} catch ( mysqli_sql_exception $e ) {

// 			return 'Failed To Update: ' . $e -> getMessage();

// 		}

// 	}

// 	public function deleteC( $c_id ) {

// 		try {

// 			return $this -> delete( $this -> _table, "c_id = $c_id" );

// 		} catch ( mysqli_sql_exception $e ) {

// 			return 'Failed To Delete: ' . $e -> getMessage();

// 		}

// 	}

// }