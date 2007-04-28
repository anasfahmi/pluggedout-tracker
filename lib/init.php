<?php

// open the config file
$cfg = new config("config.ini");

// open the database connection
$db = new database();
$con = $db->connect($cfg["server"],$cfg["database"],$cfg["username"],$cfg["password"]);

if (!$con){
	// could not connect to the database
	header("Location: problem.php?code=1");
}

?>