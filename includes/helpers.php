<?php

	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	
	//session_start();
	define('SITE_ROOT', '/web_php_cms/public/');

	//require_once 'DB.php';
	$prove = "test";

	function checkLoggedInUser()
	{
		if(isset($_SESSION['user_id']))
		{	
			$user = new stdclass();
			$user->isLoggedIn = true;
			$user->isAdmin = (isset($_SESSION['id_role']) && $_SESSION['id_role'] == 1);
			return $user;
		}

		header('Location: http://localhost/web_php_cms/public/login.php');
		exit();
	}

	function gotolink($url)
	{
		header('Location: http://localhost/'.SITE_ROOT.$url);
	}
?>