<?php
include_once __DIR__.'/db.php';

/**
* Gets terms of a given glossary.
*
* @return array Collection of associative arrays
*/
function getTerms($glossaryId){
	$connection = dbConnect();
	$sql = 'SELECT * FROM term where glossaryId='.intval($glossaryId);
	$result = mysqli_query($connection, $sql);
	$terms = [];

	if (mysqli_num_rows($result) > 0){
		while($term = mysqli_fetch_assoc($result))
			$terms[] = $term;
	}

	mysqli_close($connection);

	return $terms;
}

/**
* Get term with given id
*
* @param $id Term ID
* @return array Associative array representing term properties
*/
function getTerm($id){
	$term = [];
	$connection = dbConnect();
	$last_id = mysqli_insert_id($connection);	
	$sql = "SELECT * FROM term where id = $id";
	$result = mysqli_query($connection, $sql);

	if (mysqli_num_rows($result) > 0){
		$term = mysqli_fetch_assoc($result);
	}

	mysqli_close($connection);

	return $term;
}

/**
* Creates a new glosary
* 
* @param $term String The term
* @param $glossaryId Integer Glossary ID
* @return Array Term
*/
function saveTerm($term, $glossaryId){
	$connection = dbConnect();

	$stmt = $connection->prepare("INSERT INTO term (value,glossaryId) VALUES (?,?)");
	$stmt->bind_param("si", $term, $glossaryId);
	$last_id = null;

	if ($stmt->execute()){
		$last_id = mysqli_insert_id($connection);	
	}

	mysqli_close($connection);
	return getTerm($last_id);
}

?>

