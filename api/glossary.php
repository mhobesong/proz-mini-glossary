<?php
include_once(BASEDIR.'/functions/db.php');

if(isset($_POST['glossary-name'])){
	$connection = dbConnect($CONFIG['dbhost'], $CONFIG['dbuser'], $CONFIG['dbpass'], $CONFIG['dbname']);

	$stmt = $connection->prepare("INSERT INTO glossary (name) VALUES (?)");
	$stmt->bind_param("s", $name);

	// set parameters and execute
	$name = $_POST['glossary-name'];
	$stmt->execute();
	$connection->close();
}

header('location:'.BASEURL);
?>
