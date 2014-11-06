<?php 

  require_once '../includes/helpers.php';

  //ON LOGIN SUBMIT
  if(isset($_POST['login_form_submit']))
  {

    $db = new mysqli('127.0.0.1', 'root', '', 'etik_cms');

    //SHIKO NESE KA PROBLEME
    if($db->connect_errno > 0)
    {
      die('Unable to connect to database [' . $db->connect_error . ']');
    }
    
    //GET POST FIELD VALUES
    $username_value = $_POST['username'];
    $password_value = $_POST['password'];

    //CLEAN SPEACIAL CHARS BASED ON THE CURRENT DB's Charset
    $username_clean = $db->escape_string($username_value);
    $password_clean = $db->escape_string($password_value);

    $sql = "SELECT user_id
                 , username
                 , firstname
                 , id_role
              FROM user
             WHERE username = '$username_clean' 
               AND `password` = '$password_clean'
               AND active = 1 ";

    if(!$result = $db->query($sql)){
      die('There was an error running the query [' . $db->error . ']');
    }
    
    //print_r($result);
    //exit();

    $result = $result->fetch_assoc();
    //CHECK IF 
    if(count($result > 0) && isset($result['user_id']))
    {
  		//session_start();
  		$_SESSION['user_id'] = $result['user_id'];
  		$_SESSION['firstname'] = $result['firstname'];
  		$_SESSION['username'] = $result['username'];
  		$_SESSION['id_role'] = $result['id_role'];
  
  		//header('Location: http://localhost/'.SITE_ROOT.'account.php');
      gotolink('account.php');
    }
    else
    {
      echo "login failed";
    }
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
    
    #main_form {
      padding: 30px;
    }
    
    #main_form > label {
      display: inline-block; 
      width: 100px; 
      text-align: right;
      vertical-align: top;
    }
        
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
            <li class="active"><a href="<?php echo SITE_ROOT ?>index.php">Kreu</a></li>
            <li><a href="<?php echo SITE_ROOT ?>posts.php">Postimet</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">
  		<div id="base">        
        <h2>
          <center>Login Form</center>
        </h2>
        <center>
        <form id="main_form" action="<?php echo SITE_ROOT ?>login.php" method="POST">
          <label for="username">Username</label>
          <input id="username" type="text" name="username"><br><br>
          <label for="password">Password</label>
          <input id="password" type="password" name="password"><br>
          <hr/>
          <input type="submit" name="login_form_submit" value="Submit">     
        </form>

        </center>
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