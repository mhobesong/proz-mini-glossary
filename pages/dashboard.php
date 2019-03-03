<?php
$pageTitle = "Dashboard";
include (BASEDIR.'/pages/header.php');
include (BASEDIR.'/functions/db.php');
?>

<h1>Mini Glossary</h2>
<hr>
<h3>Add Glossary</h3>
<form method="POST" action="<?= BASEURL?>/glossary">
	<label>Name</label><br>
	<input type="text" name="glossary-name">
</form>

<hr>
<h3>Glossary List</h3>
<?php

foreach(getAllGlossaries() as $glossary){
	echo "<p><b>name</b>: {$glossary[1]}</p>";
}

?>


<?php
include (BASEDIR.'/pages/footer.php');
?>
