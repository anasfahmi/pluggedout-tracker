<?php

class database {

	var $server = "";
	var $database = "";
	var $username = "";
	var $password = "";

	var $connection = false;


	function __construct(){
	}


	// Description : Connects to the database using the database class properties
	// Arguments   : None (uses the properties of the class)
	// Returns     : Connection handle, or false
	function connect($server,$database,$username,$password){
		
		$this->server = $server;
		$this->database = $database;
		$this->username = $username;
		$this->password = $password;
		
		$this->connection = mysql_connect($this->server,$this->username,$this->password);
			
		if (!$this->connection){
			$this->connection = false;
		} else {
			if (!mysql_select_db($this->database, $this->connection)){
				$this->connection = false;
			}
		}
		return $this->connection;
	}
	
	
	// Description : Runs a query against the database
	// Arguments   : The SQL to run
	// Returns     : A resultset object
	function query($sql){
		
		$resultset = array();

		$result = false;
		if ($this->connection != false){
			$result = mysql_query($sql,$this->connection);
		} else {
			$result = false;
		}
		if ($result!=false){
			if (mysql_num_rows($result)>0){
				$i=0;
				while ($row =@ mysql_fetch_array($result)){
					$i++;
					$resultset[$i] = $row;
				}
			}
		}
		
		return $resultset;
	}
	
}



?>