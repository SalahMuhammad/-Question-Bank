<?php

class Classifications extends DatabaseHandler {

	function __construct() {
		@$this -> dbConnection();
	}

	public function getAll() {
		try {
			$query	= 'SELECT * FROM classifications ORDER BY c_id DESC';
			
			$stmt	= $this -> con -> prepare( $query );
			$stmt -> execute();

			return $stmt -> get_result() -> fetch_all();

		} catch( Exception $e ) {
			echo 'Failed To Load Data: ' . $e -> getMessage();
		}

		return [];
	}

	public function getClassificationID( $c_name ) {
		try {
			$query	= 'SELECT c_id FROM classifications WHERE c_name = \''. $c_name .'\'';

			$stmt		= $this -> con -> prepare( $query );
			$stmt -> execute();

			return $c_id 	= $stmt -> get_result() -> fetch_all() [0] [0] ?? -1;
			
		} catch ( Exception $e) {
			return 'Failed To getClassificationID: ' . $e -> getMessage();
		}
	}

	public function insert( $c_name ) {
		try {
			$query	= 'INSERT INTO classifications VALUES (null, ?)';

			$stmt	= $this -> con -> prepare( $query );
			$stmt -> bind_param( 's',  $c_name);
			$stmt -> execute();

			return  'Classification Inserted Successfully...';

		} catch( Exception $e ) {
			return 'Failed To Insert: ' . $e -> getMessage();
		}
	}

	public function update( $c_id, $c_name ) {
		try {
			$query 	= 'UPDATE classifications SET c_name = ? WHERE c_id = ?';

			$stmt	= $this -> con -> prepare( $query );
			$stmt -> bind_param( 'si', $c_name, $c_id );
			$stmt -> execute();

			return  'Classification Updated Successfully...';

		} catch( Exception $e ) {
			return 'Failed To Update: ' . $e -> getMessage();
		}
	}

	public function delete( $c_id ) {
		try {
			$query	= 'DELETE FROM classifications WHERE c_id = ?';

			$stmt 	= $this -> con -> prepare( $query );
			$stmt -> bind_param( 'i', $c_id );
			$stmt -> execute();

			return 'Classification Deleted Successfully...';

		} catch( Exception $e ) {
			return 'Failed To Delete: ' . $e -> getMessage();
		}
	}
}