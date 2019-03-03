<?php
function dbConnect()
{
	// Create connection
	$conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	return $conn;
}

function getAllGlossaries(){
	$connection = dbConnect();
	$sql = "SELECT * FROM glossary";
	$result = $connection->query($sql);
	$connection->close();
	return $result->fetch_all();
}
?>
