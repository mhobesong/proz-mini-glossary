<?php
/**
* Gets db connect handle
*
* @return Object Connection handle
*/
function dbConnect()
{
	// Create connection
	$conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . $conn->connect_error);
	}

	return $conn;
}
?>
