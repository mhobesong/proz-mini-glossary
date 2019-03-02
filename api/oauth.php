<?php
include __DIR__.'/../config.php';
include_once __DIR__.'/../functions/authentication.php';
if(isset($_GET['code'])){
	$response = getRefreshAccessToken($_GET['code'],$CONFIG['apiClientId'], $CONFIG['apiClientSecret'], $CONFIG['apiRedirectUrl']);	

	if(isset($response->access_token)){
		$user = getUser($CONFIG['apiClientId'], $CONFIG['apiClientSecret'], $CONFIG['apiRedirectUrl'], 'https://api.proz.com/v2/user');	
		var_dump($user);
	}
}
