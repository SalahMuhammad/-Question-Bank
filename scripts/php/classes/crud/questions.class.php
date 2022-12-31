<?php

class Questions extends DatabaseHandler {
	
	function __construct() {
		@$this -> dbConnection();
	}

	public function getAll( $q_id ) {
		try {
			$query	= 'SELECT * FROM questions WHERE e_id = ? ORDER BY q_id DESC';
			
			$stmt	= $this -> con -> prepare( $query );
			// $this -> con -> real_escape_string( $questions );
			$stmt -> bind_param( 'i', $q_id );
			$stmt -> execute();

			return $stmt -> get_result() -> fetch_all();

		} catch( Exception $e ) {
			echo 'Failed To Load Data: ' . $e -> getMessage();
		}

		return [];
	}

	public function insert( $question, $selections, $answer, $e_id ) {
		try {
			$query	= 'INSERT INTO questions VALUES ( null, ?, ?, ?, ? )';
			
			$stmt	= $this -> con -> prepare( $query );
			$stmt -> bind_param( 'sssi', $question, $selections, $answer, $e_id );
			$stmt -> execute();

			return  'Question Inserted Successfully...';

		} catch( Exception $e ) {
			return 'Failed To Insert: ' . $e -> getMessage();
		}
	}

	public function update( $q_id, $question, $selections, $answer, $e_id ) {
		try {
			$query 	= 
			'UPDATE questions SET 
				question = ?, 
				selections = ?, 
				answer = ?, 
				e_id = ? 
			WHERE 
				q_id = ?';

			$stmt	= $this -> con -> prepare( $query );
			$stmt -> bind_param( 'sssii', $question, $selections, $answer, $e_id, $q_id );
			$stmt -> execute();

			return  'Question Updated Successfully...';

		} catch( Exception $e ) {
			return 'Failed To Update: ' . $e -> getMessage();
		}
	}

	public function delete( $q_id ) {
		try {
			$query	= 'DELETE FROM questions WHERE q_id = ?';

			$stmt 	= $this -> con -> prepare( $query );
			$stmt -> bind_param( 'i', $q_id );
			$stmt -> execute();

			return 'Question Deleted Successfully...';

		} catch( Exception $e ) {
			return 'Failed To Delete: ' . $e -> getMessage();
		}
	}
}