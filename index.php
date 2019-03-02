<?php
define('BASEDIR', __DIR__);
define('BASEURL', 'http://localhost/proz-mini-glossary');
session_start();

include BASEDIR.'/config.php';

$params = [];
if (isset($_GET['params']))
{
	$params = $_GET['params'];
}

$params = explode('/',$params);

if (!isset($_SESSION['user']) && $params[0] != 'login')
{
	header('location:'.BASEURL.'/login');
	exit;
}

switch($params[0]){
	case 'login':
		include BASEDIR.'/pages/login/login.php';
		break;
}
