<?php
include_once __DIR__.'/db.php';

/**
* Gets all glossaries.
*
* @return array Collection of associative arrays
*/
function getGlossaries(){
	$connection = dbConnect();
	$sql = "SELECT * FROM glossary";
	$result = mysqli_query($connection, $sql);
	$glossaries = [];

	if (mysqli_num_rows($result) > 0){
		while($glossary = mysqli_fetch_assoc($result))
			$glossaries[] = $glossary;
	}

	mysqli_close($connection);

	return $glossaries;
}

/**
* Get glossary with given id
*
* @param $id Glossary ID
* @return array Associable array representing glossary properties
*/
function getGlossary($id){
	$glossary = [];
	$connection = dbConnect();
	$last_id = mysqli_insert_id($connection);	
	$sql = "SELECT * FROM glossary where id = $id";
	$result = mysqli_query($connection, $sql);

	if (mysqli_num_rows($result) > 0){
		$glossary = mysqli_fetch_assoc($result);
	}

	mysqli_close($connection);

	return $glossary;
}

/**
* Creates a new glosary
* 
* @param $name String Name of the glossary
* @return Array Glossary
*/
function saveGlossary($name){
	$connection = dbConnect();

	$stmt = $connection->prepare("INSERT INTO glossary (name) VALUES (?)");
	$stmt->bind_param("s", $name);
	$last_id = null;

	if ($stmt->execute()){
		$last_id = mysqli_insert_id($connection);	
	}

	mysqli_close($connection);
	return getGlossary($last_id);
}
?>
