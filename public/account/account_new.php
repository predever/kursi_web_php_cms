<?php

	require_once '../../includes/helpers.php';
	require_once '../../includes/DB.php';

	$loggedInUser = checkLoggedInUser();

	if(!$loggedInUser->isAdmin)
	{
		gotolink('/account.php');
	}
	else
	{		
		$sqlRoles = "SELECT role_id, role_name
					 FROM role";
		$rolesList = DB::getInstance()->select($sqlRoles);
	}

?>


<?php include('../../includes/header.php'); ?>
	
<div class="row">
	<h4 style="padding: 20px 100px 30px">Krijo Perdorues te Ri</h4>
	<form class="form-horizontal" role="form" action="<?php echo SITE_ROOT; ?>account/insert_account.php" method="POST">
	  <div class="form-group">
	    <label for="username" class="col-sm-2 control-label">Pseudonimi</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="username" name="username" placeholder="Pseudonimi">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="firstname" class="col-sm-2 control-label">Emri</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Emri">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="firstname" class="col-sm-2 control-label">Mbiemri</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Mbiemri">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="id_role" class="col-sm-2 control-label">Roli</label>
	    <div class="col-sm-10 col-md-7 col-md-5">
	    	<select id="id_role" name="id_role" class="form-control" >
	    		<?php foreach($rolesList as $role){
	    			echo "<option value='{$role->role_id}'>{$role->role_name}</option>";
	    		}
	    		?>
			</select>
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="description" class="col-sm-2 control-label">Pershkrimi</label>
	    <div class="col-sm-10">
	      <textarea class="form-control" id="description" name="description" placeholder="Pershkrimi"></textarea> 
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="email" class="col-sm-2 control-label">Email</label>
	    <div class="col-sm-10">
	      <input type="email" class="form-control" id="email" name="email" placeholder="Email">
	    </div>
	  </div>
	  
	  <?php if(isset($_GET['return_url']) && $_GET['return_url'] == 'users'): ?>
		<input type="hidden" id="return_url" name="return_url" value="users">
	  <?php endif; ?>
		
	  <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <input type="submit" name="save_acc_details" class="btn btn-primary btn-lg" value="Krijo Perdorues">
	    </div>
	  </div>
	</form>
	
</div>
    	
<?php include('../../includes/footer.php'); ?>

	<script>
		
		$(document).ready(function () 
		{
			
		});

	</script>
		
  </body>
</html>