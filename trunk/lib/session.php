<?php

session_start();

if (isset($_COOKIE["pluggedout_tracker"])){

	$hashed_password = mysql_escape_string($_COOKIE["pluggedout_tracker"]);
	
	// look up the hashed password in the database
	$result = $db->query("SELECT nUserId,cUsername,nAdmin FROM users WHERE cPassword='" + $hashed_password + "'");
	if ($result!=false){
		if (count($result)>0){
			$_SESSION["login_userid"] = $result[0]["nUserId"];
			$_SESSION["login_username"] = $result[0]["cUsername"];
			$_SESSION["login_admin"] = $result[0]["nAdmin"]==1 ? true : false;
		} else {
			$_SESSION["login_userid"] = "";
			$_SESSION["login_username"] = "";
			$_SESSION["login_admin"] = "";
		}
	}
}



?>