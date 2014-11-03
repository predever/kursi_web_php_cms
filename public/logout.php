<?php
	
	unset($_SESSION['user_id']);
	unset($_SESSION['firstname']);
	unset($_SESSION['username']);

	header('Location: http://localhost/web_php_cms/public/index.php');
?>