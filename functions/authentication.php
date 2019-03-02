<?php

function getAccessToken($clientId,$clientSecret){
	$ch = curl_init();
	$data = ['grant_type'=>'client_credentials'];
	curl_setopt($ch, CURLOPT_URL, 'https://www.proz.com/oauth/token');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_USERPWD, "$clientId:$clientSecret");
	curl_setopt($ch, CURLOPT_HEADER, ['Content-Type'=>'application/json']);
	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	curl_setopt($ch, CURLOPT_POSTFIELDS,  $data);
	$output = curl_exec($ch);
	$info = curl_getinfo($ch);

	var_dump($output);
	curl_close($ch);
}

?>
