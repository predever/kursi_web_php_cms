<?php
	
	require_once '../../includes/helpers.php';
	require_once '../../includes/DB.php';

	$loggedInUser = checkLoggedInUser();

	if($loggedInUser->isLoggedIn && $loggedInUser->isAdmin)
	{
		//ON LOGIN SUBMIT
		if(isset($_POST['save_acc_details']))
		{
			$db = new DB();

			$username = $db->escape($_POST['username']);
			$firstname = $db->escape($_POST['firstname']);
			$lastname = $db->escape($_POST['lastname']);
			$description = $db->escape($_POST['description']);
			$email = $db->escape($_POST['email']);
			$id_role = $db->escape($_POST['id_role']);
			
			$sql = "SELECT user_id
					FROM user
					WHERE username = '$username'
					Limit 1";

			$existingUser = $db->select($sql);
			if(count($existingUser)>0)
			{
				echo "username exists";
			}
			else
			{	
				$currentDate = date("Y-m-d H:i:s");
				$sql = "INSERT INTO user(username, id_role, firstname, lastname, description, email, date_created, active)
						values('$username', $id_role, '$firstname', '$lastname', '$description', '$email', '$currentDate', 1)";
				
				if(!$db->query($sql)){
			    	echo 'error';
					//var_dump($db->getError());
			    }

			    if(isset($_POST['return_url']) && $_POST['return_url'] == 'users')
			    {
					gotolink('/users.php');
			    }
			    else
			    {
			    	gotolink('/account.php');
			    }
			}
		}
	}

?>