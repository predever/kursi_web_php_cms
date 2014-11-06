<?php

	require_once '../includes/helpers.php';
	require_once '../includes/DB.php';


	if(checkLoggedInUser()->isLoggedIn == true)
	{
		$userID = DB::getInstance()->escape($_SESSION['user_id']);

		$sql = "SELECT user.*, role.role_name
				FROM user
				INNER JOIN role 
					ON (role.role_id = user.id_role)
				WHERE user_id = $userID

				Limit 1";
		$result = DB::getInstance()->select($sql);
		$userDetails = $result[0];
	}

?>

<?php include('../includes/header.php'); ?>
			
			<nav role="navigation" class="navbar navbar-default">
		      <div class="container-fluid">
		        <div class="navbar-header">
		          <a href="<?php echo SITE_ROOT ?>/account/account_edit.php?user_id=<?php echo $userDetails->user_id; ?>" 
		          	 class="navbar-brand">Ndrysho Te Dhenat</a>
		        </div>
		        <div class="collapse navbar-collapse pull-right" style="padding-top: 8px">
		          	<?php if(checkLoggedInUser()->isAdmin): ?>
						<a class="btn btn-success" href="<?php echo SITE_ROOT; ?>/account/account_new.php">Krijo Perdorues</a> 
						<a class="btn btn-info" href="<?php echo SITE_ROOT; ?>/users.php">Lista e Perdoruesve</a>
					<?php endif; ?>
					<a class="btn btn-primary" href="<?php echo SITE_ROOT; ?>/posts/posts_list.php">Lista e Postimeve</a>
		        </div>
		      </div>
		    </nav>

			
			<div class="row">
				<dl class="dl-horizontal col-md-9 col-lg-8">
			      <dt>logo</dt> <dd><img src="<?php echo SITE_ROOT.'/img/account/'.$userDetails->img_url; ?>" height="150"></dd>
			      <br>
			      <dt>Pseudonimi</dt> <dd><?php echo $userDetails->username; ?></dd>
			      <dt>Emri</dt> <dd><?php echo $userDetails->firstname; ?></dd>
			      <dt>Mbiemri</dt> <dd><?php echo $userDetails->lastname; ?></dd>
			      <br>			      
			      <dt>Pershkrimi</dt> <dd><?php echo $userDetails->description; ?></dd>
			      <br>			      
			      <dt>Roli</dt> <dd><?php echo $userDetails->role_name; ?></dd>			      
			      <dt>Email</dt> <dd><?php echo $userDetails->email; ?></dd>			      
			      <dt>Gjendja</dt> <dd><?php echo ($userDetails->active==1)?'Aktiv':'Jo aktiv!'; ?></dd>			      
			      <dt>Krijuar</dt> <dd><?php echo date("d-m-Y", strtotime($userDetails->date_created)); ?></dd>			      
				<br>
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