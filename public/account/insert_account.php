<?php
	
	require_once '../../includes/helpers.php';
	require_once '../../includes/DB.php';

	$loggedInUser = checkLoggedInUser();

	if($loggedInUser->isLoggedIn && $loggedInUser->isAdmin)
	{
		//ON LOGIN SUBMIT
		if(isset($_POST['save_acc_derails']))
		{
			$db = new DB();

			$username = $db->escape($_POST['username']);
			$firstName = $db->escape($_POST['first_name']);
			$lastName = $db->escape($_POST['last_name']);
			
			$sql = "SELECT user_id
					FROM USER
					WHERE username = '$username'
					Limit 1";

			$existingUser = $db->select($sql);
			if(count($existingUser)>0)
			{
				echo "username exists";
			}
			else
			{				
				//try {
				$currentDate = date("Y-m-d H:i:s");
				$sql = "INSERT INTO user(username, id_role, firstname, lastname, date_created)
							values('$username', 2, '$firstName', '$lastName', '$currentDate')";
				
				if(!$db->query($sql)){
			    	echo 'error';
					//var_dump($db->getError());
			    }
			}
		}
	}

?>