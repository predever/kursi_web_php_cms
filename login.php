<?php 


	//ON LOGIN SUBMIT
	if(isset($_POST['login_form_submit']))
	{
		$db = new mysqli('localhost', 'root', '', 'php_test');

		//SHIKO NESE KA PROBLEME
		if($db->connect_errno > 0)
		{
			die('Unable to connect to database [' . $db->connect_error . ']');
		}
		
		//GET POST FIELD VALUES
		$username_value = $_POST['username'];
		$password_value = $_POST['password'];

		//CLEAN SPEACIAL CHARS BASED ON THE CURRENT DB's Charset
		$username_clean = $db->escape_string($username_value);
		$password_clean = $db->escape_string($password_value);

		$sql = "SELECT user_id
				  FROM user
				 WHERE username = '$username_clean' 
				   AND `password` = '$password_clean'
				   AND active = 1 ";

		if(!$result = $db->query($sql)){
			die('There was an error running the query [' . $db->error . ']');
		}
		
		print_r($result);
		exit();

		$result = $result->fetch_assoc();
		//CHECK IF 
		if(count($row > 0) && isset($row['user_id']))
		{
			header('Location: http://localhost/web_php_cms/account.php/');
		}
		else
		{
			echo "login failed";
		}
	}

?>

<!DOCTYPE html>
<html lang='sq'>
<head>
	<meta charset="UTF-8" /> 
	<title>
		ETIK.al - Kontakti
	</title>
	<link href="css/stilimi.css" type="text/css" rel="stylesheet" />
	
	<style>
		
		#main_form {
			padding: 30px;
		}
		
		#main_form > label {
			display: inline-block; 
			width: 100px; 
			text-align: right;
			vertical-align: top;
		}
		
		
	</style>
	
</head>
<body>

	<div id="base">
		
		<h2>
			<center>Login Form</center>
		</h2>
		<center>
		<form id="main_form" action="http://localhost/web_php_cms/login.php" method="POST">
			<label for="username">Username</label>
			<input id="username" type="text" name="username"><br><br>
			<label for="password">Password</label>
			<input id="password" type="password" name="password"><br>
			<hr/>
			<input type="submit" name="login_form_submit" value="Submit">			
		</form>

		</center>
	</div>

</body>
</html>
