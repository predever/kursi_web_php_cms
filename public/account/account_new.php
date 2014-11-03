<?php

	require_once '../../includes/helpers.php';

	$loggedInUser = checkLoggedInUser();

	if(!$loggedInUser->isAdmin)
	{
		gotolink('/account.php');
	}

?>



<?php include('../../includes/header.php'); ?>
	
	
			<div class="row">
				<h4>
					Krijo Perdorues te Ri
				</h4>
				
				<form id="main_form" action="<?php echo SITE_ROOT; ?>account/insert_account.php" method="POST">
					<label for="username">Username</label>
					<input id="username" type="text" name="username" value="" placeholder="Kutia e Emrit"><br><br>
					<label for="first_name">Emri</label>
					<input id="first_name" type="text" name="first_name" value="" placeholder="Kutia e Emrit"><br><br>
					<label for="last_name">Mbiemri</label>
					<input id="last_name" type="text" name="last_name" value=""><br><br><hr/>
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