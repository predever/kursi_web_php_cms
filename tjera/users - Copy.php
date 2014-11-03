<?php
	
	require_once 'DB.php';

	if(isset($_SESSION['user_id']))
	{
		$userID = DB::getInstance()->escape($_SESSION['user_id']);

		$sql = "SELECT *
				FROM USER";
		$usersResult = DB::getInstance()->select($sql);

	}
	else
	{		
		header('Location: http://localhost/web_php_cms/login.php');
	}
?>

<!DOCTYPE html>
<html lang="sq">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ETIK.al</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- MAIN page styles -->
    <link href="css/main-styles.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<style>

	</style>
	
  </head>
  <body>
    
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><img src="img/sample.png" width="100" height="30"/> ETIK.al</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav" style="float: right;">
            <li class="active"><a href="/web_php_cms/main.php">Kreu</a></li>
            <li><a href="/web_php_cms/posts.php">Postimet</a></li> 

            <?php  if(isset($_SESSION['user_id'])):  ?>
				<li><a href="/web_php_cms/account.php"> Hej <b><?php echo ucwords($_SESSION['firstname']); ?></b></a></li>
				<li><a href="/web_php_cms/logout.php">Dil</a></li>            	
            <?php  else:  ?>
				<li><a href="/web_php_cms/login.php">Hyr ne Llogari</a></li>
            <?php  endif; ?>

          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">
		<div class="base">		
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
			          <td><?php echo $user->username; ?></td>
			          <td><?php echo $user->firstname; ?></td>
			          <td><?php echo $user->lastname; ?></td>
			          <td><?php echo $user->date_created; ?></td>
			        </tr>
				<?php endforeach; ?>
			      </tbody>
			    </table>
			</div>

		</div>
    </div>
	
	
	<div id="footer" class="container" style="">
		<center>
			<h4>&copy; Etik.al <?php echo date('Y') ?> - Te gjitha te drejtat e rezervuara &reg; </h4>
		</center>
	</div>	
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	
	
	<script>
		
		$(document).ready(function () 
		{
			
		});

	</script>
		
  </body>
</html>