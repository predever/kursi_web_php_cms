<?php

	require_once '../includes/helpers.php';
	require_once '../includes/DB.php';


	if(checkLoggedInUser()->isLoggedIn == true)
	{
		$userID = DB::getInstance()->escape($_SESSION['user_id']);

		$sql = "SELECT *
				FROM USER
				WHERE user_id = $userID
				Limit 1";
		$result = DB::getInstance()->select($sql);
		$userDetails = $result[0];
	}

?>

<?php include('../includes/header.php'); ?>
	
			<div class="row">
				<a href="<?php echo SITE_ROOT; ?>/account/account_new.php">Krijo Perdorues</a></li>            	
				<a href="<?php echo SITE_ROOT; ?>/account/users.php">Lista e Perdoruesve</a></li>            	
			</div>
			<div class="row">
				<dl class="dl-horizontal">
			      <dt>Username</dt> <dd><?php echo $userDetails->username; ?></dd>
			      <dt>Emri</dt> <dd><?php echo $userDetails->firstname; ?></dd>
			      <dt>Mbiemri</dt> <dd><?php echo $userDetails->lastname; ?></dd>
			      
				<br>
				<a href="<?php echo SITE_ROOT ?>/account/account_edit.php?user_id=<?php echo $userDetails->user_id; ?>">Ndrysho Te dhenat</a></li>            	
            
			</div>
		</div>
    </div>
	

<?php include('../includes/footer.php'); ?>

	<script>
		
		$(document).ready(function () 
		{
			
		});

	</script>
		
  </body>
</html>