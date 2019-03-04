<?php
include_once(BASEDIR.'/functions/glossary.php');
include_once(BASEDIR.'/functions/term.php');

if(isset($_POST['glossary-name']) && $_POST['glossary-name']){

	$connection = dbConnect();
	$glossary = saveGlossary(trim($_POST['glossary-name']));
	$terms = [];

	if (isset($_POST['terms']) && is_array($_POST['terms'])){
		foreach ($_POST['terms'] as $term){
			$term_ = saveTerm($term, $glossary['id']);
			if($term_) $terms[] = $term_;
		}
	}

	if (count($glossary)){
		$response = new stdclass;
		$response->code = 200;
		$response->glossary = $glossary;
		$response->terms = $terms;
		echo json_encode($response);
		exit;
	}
}

$response = new stdclass;
$response->code = 400;
echo json_encode($response);
?>
