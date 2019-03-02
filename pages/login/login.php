<?php
include_once BASEDIR.'/functions/authentication.php';

/**Handle login request**/
if (isset($_POST['signin'])){

	$token_request_reply = getAccessToken($CONFIG['apiClientId'], $CONFIG['apiClientSecret']);	

	if (isset($token_request_reply->access_token)){
		$_SESION['auth_token'] = $token_request_reply->access_token;
		echo json_encode(['code'=>200, 'clientId'=>$CONFIG['apiClientId'], 'redirect'=>$CONFIG['apiRedirectUrl']]);
		exit;
	}else{
		echo json_encode(['code'=>400]);
	}
}

$pageTitle = "Login";
include (BASEDIR.'/pages/header.php');
include (BASEDIR.'/pages/login/form.php');
include (BASEDIR.'/pages/footer.php');
?>
