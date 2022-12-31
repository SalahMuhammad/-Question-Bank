<?php

class DatabaseHandler {
	protected $con;

	public function __destruct() {
		mysqli_close( $this -> con );
	}

	protected function dbConnection() {
		try {
			$this -> con = new MySqli( 
				'localhost', 
				'admin', 
				'admin', 	
				'question_bank'
			);	
		} catch ( Exception $e ) {
			die ( 'Connection Failed: ' . $e -> getMessage() );
		}
	}
}




