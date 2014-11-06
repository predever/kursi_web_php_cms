<?php

	require_once '../../includes/helpers.php';
	require_once '../../includes/DB.php';

	$loggedInUser = checkLoggedInUser();

	if($loggedInUser->isLoggedIn && ($loggedInUser->isAdmin || $_GET['user_id'] == $_SESSION['user_id']) )
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

			$sqlRoles = "SELECT role_id, role_name
						 FROM role";
			$rolesList = DB::getInstance()->select($sqlRoles);
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
	<h4 style="padding: 20px 100px 30px">Ndrysho te dhenat e perdoruesit <span class="label label-info"><?php echo $userDetails->username; ?><span></h4>
	<form class="form-horizontal" role="form" action="<?php echo SITE_ROOT; ?>account/save_account.php" method="POST">
	  <div class="form-group">
	    <label for="firstname" class="col-sm-2 control-label">Emri</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $userDetails->firstname; ?>" placeholder="Emri">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="firstname" class="col-sm-2 control-label">Mbiemri</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $userDetails->lastname; ?>" placeholder="Mbiemri">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="id_role" class="col-sm-2 control-label">Roli</label>
	    <div class="col-sm-10 col-md-7 col-md-5">
	    	<select id="id_role" name="id_role" class="form-control" >
	    		<?php foreach($rolesList as $role) {
	    			echo "<option value='{$role->role_id}' ";
	    			if($role->role_id == $userDetails->id_role)
	    			{
	    				echo 'selected="selected"';
	    			}
	    			echo " >{$role->role_name}</option>";
	    		}
	    		?>
			</select>
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="description" class="col-sm-2 control-label">Pershkrimi</label>
	    <div class="col-sm-10">
	      <textarea class="form-control" id="description" name="description" placeholder="Pershkrimi"><?php echo $userDetails->description; ?></textarea> 
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="email" class="col-sm-2 control-label">Email</label>
	    <div class="col-sm-10">
	      <input type="email" class="form-control" id="email" name="email" value="<?php echo $userDetails->email; ?>" placeholder="Email">
	    </div>
	  </div>
	  
	  <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <div class="checkbox">
	        <label>
	          <input type="checkbox" <?php echo ($userDetails->active == 1)?'checked="checked"':''; ?> id="active_chbox" name="active_chbox" > Aktiv
	        </label>
	      </div>
	    </div>
	  </div>

	    <input type="hidden" id="hidden_user_id" name="hidden_user_id" value="<?php echo $userDetails->user_id; ?>">
		<?php if(isset($_GET['return_url']) && $_GET['return_url'] == 'users'): ?>
			<input type="hidden" id="return_url" name="return_url" value="users">
		<?php endif; ?>
		
	  <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <input type="submit" name="save_acc_details" class="btn btn-primary btn-lg" value="Ruaj Ndryshimet">
	      <?php if($userDetails->user_id != $_SESSION['user_id']): ?>
	      	<a href="<?php echo SITE_ROOT ?>/account/delete_account.php?user_id=<?php echo $userDetails->user_id; ?>" 
		          	 class="btn btn-danger" style="margin-left: 50px;">Fshi Perdoruesin</a>
		  <?php endif; ?>
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