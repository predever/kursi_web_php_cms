<?php
	
	require_once '../includes/helpers.php';
	require_once '../includes/DB.php';

	$loggedInUser = checkLoggedInUser();

	if($loggedInUser->isLoggedIn && $loggedInUser->isAdmin)
	{
		$userID = DB::getInstance()->escape($_SESSION['user_id']);

		$sql = "SELECT user.*, role.role_name
				FROM user
				INNER JOIN role
				on(role.role_id = user.id_role)";
		$usersResult = DB::getInstance()->select($sql);
	}
	else
	{
		gotolink('index.php');
	}

?>


<?php include('../includes/header.php'); ?>
		
			<nav role="navigation" class="navbar navbar-default">
		      <div class="container-fluid">
		        <div class="collapse navbar-collapse pull-right" style="padding-top: 8px">
		          	<a class="btn btn-success" href="<?php echo SITE_ROOT; ?>/account/account_new.php?return_url=users">Krijo Perdorues te Ri</a> 
				</div>
		      </div>
		    </nav>

			<div class="row">

			<table class="table">
		      <thead>
		        <tr>
		          <th>Pseudonimi</th>
		          <th>Emri</th>
		          <th>Mbiemri</th>
		          <th>Roli</th>
		          <th>Gjendja</th>
		          <th>Krijuar</th>
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
			          <td><?php echo $user->role_name; ?></td>
			          <td><?php echo $user->active==1?'Aktiv':'Jo aktiv!'; ?></td>
			          <td><?php echo date("d-M-Y", strtotime($user->date_created));?></td>
			        </tr>
				<?php endforeach; ?>
			      </tbody>
			    </table>
			</div>

<?php include('../includes/footer.php'); ?>

	<script>
		
		$(document).ready(function () 
		{
			
		});

	</script>
		
  </body>
</html>