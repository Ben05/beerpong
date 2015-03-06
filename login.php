<?php
	session_start();

		  try{
         $pdo = new PDO(
            'mysql:host=localhost;dbname=acaiwebc_beerpong',
            'acaiwebc_root',
            'hcd1$mch',
            array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
            );
         $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
         $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

		
		}
      catch(Exception $e) {
         die($e->getMessage());
      }
	$username = $_POST["InputUsername"];
	$password = $_POST["InputPassword"];
	if (!empty($_POST))
	{

	  
	  	$stmp = $pdo->prepare("SELECT username FROM Users WHERE username = :username AND password =:password");
	  
		$stmp->execute(array(':username' => $username, ':password' => sha1($password)));
		$_SESSION["connected"] = false;
		if ($stmp->rowCount() > 0)
		{
			$_SESSION["connected"] = true;
			header("Location: ./index.php");
		}
		else
		{
			$error = true;
			$errorMessage = "Username and/or password invalid";
		}
	}

?>

<html>
<head>
	<title>Beerpong</title>
	<link href="lib/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="css/style.css" rel="stylesheet" type="text/css">

	<script type="text/javascript" src="lib/jquery-2.1.3.min.js"></script>
	<script type="text/javascript" src="lib/bootstrap/js/bootstrap.js"></script>
</head>
<body>
	<?php include "partials/header.php"; ?>
	<div id="content" class="col-xs-6 col-xs-offset-3">
		<?php
			if ($error)
			{
				echo $errorMessage;
			}
		?>
		<br />
		<form method="post" action="./login.php">
		  <div class="form-group">
			<label for="Username">Username</label>
			<input type="text" class="form-control" name="InputUsername" id="InputUsername" placeholder="Enter username" required>
		  </div>

		  <div class="form-group">
			<label for="InputPassword1">Password</label>
			<input type="password" class="form-control" name="InputPassword" id="InputPassword" placeholder="Password" required>
		  </div>

		  <button type="submit" class="btn btn-default">Login</button>
		</form>

	</div>
	
	
	
</body>
</html>