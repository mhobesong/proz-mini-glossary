<?php
include_once(BASEDIR.'/functions/glossary.php');
include_once(BASEDIR.'/functions/term.php');

$glossaries = getGlossaries();
$terms = [];

foreach($glossaries as $glossary){
	$terms[] = getTerms($glossary['id']);
}

if (count($glossaries)){
	$response = new stdclass;
	$response->code = 200;
	$response->glossaries = $glossaries;
	$response->terms = $terms;
	echo json_encode($response);
}else{
	$response = new stdclass;
	$response->code = 400;
	echo json_encode($response);
}
?>
