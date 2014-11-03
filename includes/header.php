<?php 
  require_once 'helpers.php';
?>
<!DOCTYPE html>
<html lang="sq">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ETIK.al</title>

    <!-- Bootstrap -->
    <link href="<?php echo SITE_ROOT; ?>css/bootstrap.min.css" rel="stylesheet">
    <!-- MAIN page styles -->
    <link href="<?php echo SITE_ROOT; ?>css/main-styles.css" rel="stylesheet">

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
          <a class="navbar-brand" href="#"><img src="<?php echo SITE_ROOT; ?>img/sample.png" width="100" height="30"/> ETIK.al</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav" style="float: right;">
            <li class="active"><a href="<?php echo SITE_ROOT; ?>index.php">Kreu</a></li>
            <li><a href="<?php echo SITE_ROOT; ?>posts.php">Postimet</a></li>

            <?php  if(isset($_SESSION['user_id'])):  ?>
				<li><a href="<?php echo SITE_ROOT; ?>account.php"> Hej <b><?php echo ucwords($_SESSION['firstname']); ?></b></a></li>            	
				<li><a href="<?php echo SITE_ROOT; ?>logout.php">Dil</a></li>            	
            <?php  else:  ?>
				<li><a href="<?php echo SITE_ROOT; ?>login.php">Hyr ne Llogari</a></li>
            <?php  endif; ?>

          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">
		<div class="base">		