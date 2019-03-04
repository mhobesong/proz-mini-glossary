<?php
session_start();

include __DIR__.'/config.php';
		$_SESSION['user'] = 'user';

$params = [];
if (isset($_GET['params']))
{
	$params = $_GET['params'];
}

$params = explode('/',$params);

if (!isset($_SESSION['user']) && $params[0] != 'login' && $params[0] != 'oauth')
{
	header('location:'.BASEURL.'/login');
	exit;
}

switch($params[0]){
	case 'login':
		include BASEDIR.'/pages/login/login.php';
		break;

	case 'oauth':
		include BASEDIR.'/api/oauth.php';
		break;
	case 'glossary':
		include BASEDIR.'/api/glossary.php';
		break;
	case 'glossaries':
		include BASEDIR.'/api/glossaries.php';
		break;
	default:
		include BASEDIR.'/pages/dashboard.php';

}
