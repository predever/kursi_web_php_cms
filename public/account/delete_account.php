<?php
	
	require_once '../../includes/helpers.php';
	require_once '../../includes/DB.php';
	
	$loggedInUser = checkLoggedInUser();
	
	if($loggedInUser->isLoggedIn && $loggedInUser->isAdmin)
	{
		if(isset($_GET['user_id']))
		{
			$db = new DB();

			$userID = $db->escape($_GET['user_id']);

			$sql = "SELECT *
					FROM USER
					WHERE user_id = $userID
					Limit 1";

			$existingUser = $db->select($sql);
			if(count($existingUser)>0)
			{
				$sql = "DELETE FROM user 
						WHERE user_id = $userID";
				
				if(!$db->query($sql)){
			      die('error');
			    }

			    gotolink('/users.php');
			}
			else
			{
				echo "user doesn't exist";
				exit();
			}
		}
	}
?>