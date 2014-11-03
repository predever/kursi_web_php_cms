<?php
	
	require_once '../../includes/helpers.php';
	require_once '../../includes/DB.php';

	$loggedInUser = checkLoggedInUser();

	if($loggedInUser->isLoggedIn && $loggedInUser->isAdmin)
	{
		$userID = DB::getInstance()->escape($_SESSION['user_id']);

		$sql = "SELECT *
				FROM USER";
		$usersResult = DB::getInstance()->select($sql);

	}

?>


<?php include('../../includes/header.php'); ?>
		
			<div class="row">

			<table class="table">
		      <thead>
		        <tr>
		          <th>Username</th>
		          <th>First Name</th>
		          <th>Last Name</th>
		          <th>Date Created</th>
		        </tr>
		      </thead>				      
		      <tbody>
				<?php foreach($usersResult as $user): ?>
					<tr>
			          <td>
						<a href="<?php echo SITE_ROOT ?>/account/account_edit.php?return_url=users&user_id=<?php echo $user->user_id; ?>">
						<?php echo $user->username; ?></a></td>
			          <td><?php echo $user->firstname; ?></td>
			          <td><?php echo $user->lastname; ?></td>
			          <td><?php echo $user->date_created; ?></td>
			        </tr>
				<?php endforeach; ?>
			      </tbody>
			    </table>
			</div>

<?php include('../../includes/footer.php'); ?>

	<script>
		
		$(document).ready(function () 
		{
			
		});

	</script>
		
  </body>
</html>