<?php

function getAccessToken($clientId,$clientSecret){
	$ch = curl_init();
	$data = ['grant_type'=>'client_credentials'];
	curl_setopt($ch, CURLOPT_URL, 'https://www.proz.com/oauth/token');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_USERPWD, "$clientId:$clientSecret");
	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	curl_setopt($ch, CURLOPT_POSTFIELDS,  $data);
	return json_decode(curl_exec($ch));
}

function getRefreshAccessToken($code, $clientId, $clientSecret,  $redirect){
	$ch = curl_init();
	$data = ['grant_type'=>'authorization_code', 'code'=>$code, 'redirect_uri'=>$redirect];
	curl_setopt($ch, CURLOPT_URL, 'https://www.proz.com/oauth/token');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_USERPWD, "$clientId:$clientSecret");
	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	curl_setopt($ch, CURLOPT_POSTFIELDS,  $data);
	return json_decode(curl_exec($ch));
}

function getUser($clientId,$clientSecret, $token){
	$ch = curl_init();
	$data = ['access_token'=>$token];
	curl_setopt($ch, CURLOPT_URL, 'https://api.proz.com/v2/user');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_USERPWD, "$clientId:$clientSecret");
	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	curl_setopt($ch, CURLOPT_POSTFIELDS,  $data);
	return json_decode(curl_exec($ch));
}
?>
