<?php

//db connection settings
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "project0";

//connection to the database
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	if (!$conn) {
		echo "database failed";
	} 



?>
