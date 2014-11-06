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

			$userID = $db->escape($_POST['hidden_user_id']);
			$firstname = $db->escape($_POST['firstname']);
			$lastname = $db->escape($_POST['lastname']);
			$description = $db->escape($_POST['description']);
			$email = $db->escape($_POST['email']);

			$active = $db->escape($_POST['active_chbox']);			
			$active = (isset($active) && $active != "")? 1 : 0;

			$id_role = $db->escape($_POST['id_role']);
			

			$sql = "SELECT *
					FROM USER
					WHERE user_id = $userID
					Limit 1";

			$existingUser = $db->select($sql);
			if(count($existingUser)>0)
			{
				$sql = "UPDATE user SET 
						firstname = '$firstname'
						, lastname = '$lastname'
						, description = '$description'
						, email = '$email'
						, active = $active
						, id_role = $id_role
						WHERE user_id = $userID";

				if(!$db->query($sql)){
			      die('error');
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
			else
			{
				echo "user doesn't exist";
				exit();
			}
		}
	}
?>