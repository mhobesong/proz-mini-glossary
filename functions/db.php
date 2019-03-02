<?php
function dbConnect($servername, $username, $password, $dbname)
{
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	return $conn;
}

function getAllGlossaries(){
	$connection = dbConnect($CONFIG['dbhost'], $CONFIG['dbuser'], $CONFIG['dbpass'], $CONFIG['dbname']);
	$sql = "SELECT * FROM glossaries";
	$result = $connection->query($sql);
	$connection->close();
	return $result->fetch_assoc();
}
?>
