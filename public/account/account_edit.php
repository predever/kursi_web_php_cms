<?php

	require_once '../../includes/helpers.php';
	require_once '../../includes/DB.php';

	$loggedInUser = checkLoggedInUser();

	if($loggedInUser->isLoggedIn && $loggedInUser->isAdmin)
	{
		if(isset($_GET['user_id']))
		{
			$userID = DB::getInstance()->escape($_GET['user_id']);

			$sql = "SELECT * 
					FROM USER
					WHERE user_id = $userID
					Limit 1";
			$result = DB::getInstance()->select($sql);
			$userDetails = $result[0];
		}
		else
		{
			//insert
			gotolink('/account/account_new.php');
		}
	}
	else
	{	
		//header('Location: http://localhost/'.SITE_ROOT.'login.php');
		gotolink('login.php');
	}

?>


<?php include('../../includes/header.php'); ?>
	

			<div class="row">
				<h4>
					Ndrysho te dhenat per: <?php echo $userDetails->username; ?>
				</h4>
				
				<form id="main_form" action="<?php echo SITE_ROOT; ?>account/save_account.php" method="POST">
					<label for="first_name">Emri</label>
					<input id="first_name" type="text" name="first_name" value="<?php echo $userDetails->firstname; ?>" placeholder="Kutia e Emrit"><br><br>
					<label for="last_name">Mbiemri</label>
					<input id="last_name" type="text" name="last_name" value="<?php echo $userDetails->lastname; ?>"><br><br>
					<input type="hidden" id="hidden_user_id" name="hidden_user_id" value="<?php echo $userDetails->user_id; ?>">
					<?php if(isset($_GET['return_url']) && $_GET['return_url'] == 'users'): ?>
						<input type="hidden" id="return_url" name="return_url" value="users">
					<?php endif; ?>
					<hr/>
					<input type="submit" name="save_acc_derails" value="Submit">
			</div>
    	
<?php include('../../includes/footer.php'); ?>

	<script>
		
		$(document).ready(function () 
		{
			
		});

	</script>
		
  </body>
</html>