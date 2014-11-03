<?php
	
	require_once '../../includes/helpers.php';
	require_once '../../includes/DB.php';
	
	$loggedInUser = checkLoggedInUser();
	
	if($loggedInUser->isLoggedIn && $loggedInUser->isAdmin)
	{
		//ON LOGIN SUBMIT
		if(isset($_POST['save_acc_derails']))
		{
			/*echo $_POST['first_name'];
			echo $_POST['last_name'];
			echo $_POST['hidden_user_id'];*/

			$db = new DB();

			$userID = $db->escape($_POST['hidden_user_id']);
			$firstName = $db->escape($_POST['first_name']);
			$lastName = $db->escape($_POST['last_name']);
			
			
			$sql = "SELECT *
					FROM USER
					WHERE user_id = $userID
					Limit 1";

			$existingUser = $db->select($sql);
			if(count($existingUser)>0)
			{
				$sql = "UPDATE user SET 
						firstname = '$firstName',
						lastname = '$lastName'
						WHERE user_id = $userID";

				if(!$db->query($sql)){
			      die('error');
			    }

			    if(isset($_POST['return_url']) && $_POST['return_url'] == 'users')
			    {
					gotolink('/account/users.php');
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