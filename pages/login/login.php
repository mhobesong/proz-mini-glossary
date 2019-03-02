<?php
include_once BASEDIR.'/functions/authentication.php';

/**Handle login request**/
if (isset($_POST['email']) && isset($_POST['password'])){
	getAccessToken($CONFIG['apiClientId'], $CONFIG['apiClientSecret']);	
}

$pageTitle = "Login";
include (BASEDIR.'/pages/header.php');
include (BASEDIR.'/pages/login/form.php');
include (BASEDIR.'/pages/footer.php');
?>
