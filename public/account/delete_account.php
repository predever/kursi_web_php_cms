<?php
	

	require_once 'DB.php';

	//ON LOGIN SUBMIT
	if(isset($_GET['user_id']))
	{
		/*echo $_POST['first_name'];
		echo $_POST['last_name'];
		echo $_POST['hidden_user_id'];*/

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
			$sql = "DELETE FROM user WHERE user_id=1";
			
			if(!$db->query($sql)){
				var_dump($db->getConnection()->error);
		    	echo 'error';
		    }

		}


	}

?>