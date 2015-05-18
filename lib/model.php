<?php

class Model {
	
	function dbconn(){
		try {
			return new PDO(DSN, DB_USER, DB_PASS);
		} catch (PDOException $e) {
			echo $e->getMessage();
			exit;
		}
	}
}

