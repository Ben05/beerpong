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
	  
	if (!empty($_POST))
	{
	$username = $_POST["InputUsername"];
	$mail = $_POST["InputEmail"];
	$password = $_POST["InputPassword"];
	// $mail = $_POST["inputMail"];

	

	  
		$stmp = $pdo->prepare("SELECT username FROM Users WHERE username = :username");
	  
		$stmp->execute(array(':username' => $username));
		$_SESSION["AUU"] = false;
		if ($stmp->rowCount() > 0)
		{
			$_SESSION["AUU"] = true;
		}
		else
		{
		  
			$stmp = $pdo->prepare("INSERT INTO Users(username, password, mail) VALUES(:username, :password, :mail)");
			// $stmp->execute(array(
							// 'username' => $username,
							// 'password' => $password,
							// 'mail' => $mail
							// ));
			
			// $stmp->bindParam(1, $username);
			// $stmp->bindParam(2, $password);
			// $stmp->bindParam(3, $mail);

				// $username = $_POST["InputUsername"];
		// $mail = $_POST["InputMail"];
		// $password = $_POST["InputPassword"];
			
			$stmp->execute(array(':username' => $username, ':password' => sha1($password), ':mail' => $mail));
			
			echo $username;
			echo $password;
			echo $mail;
			
			$affected_rows = $stmp->rowCount();
		  echo $affected_rows;
		  header("Location: ./login.php");
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
		if ($_SESSION["AUU"])
		{
			echo "<br />Username already in use.";
		}
	?>
		<p><br /></p>
		<form method="post" action="./signup.php">
		  <div class="form-group">
			<label for="Username">Username</label>
			<input type="text" class="form-control" name="InputUsername" id="InputUsername" placeholder="Enter username" required>
		  </div>
		  <div class="form-group">
			<label for="InputEmail1">Email address</label>
			<input type="email" class="form-control" name="InputEmail" id="InputEmail" placeholder="Enter email" required>
		  </div>
		  <div class="form-group">
			<label for="InputPassword1">Password</label>
			<input type="password" class="form-control" name="InputPassword" id="InputPassword" placeholder="Password" required>
		  </div>
		  <div class="form-group">
			<label for="InputFile">File input</label>
			<input type="file" id="InputFile">
			<p class="help-block">Example block-level help text here.</p>
		  </div>
		  <button type="submit" class="btn btn-default">Sign up</button>
		</form>
	
	</div>
</body>
</html>
