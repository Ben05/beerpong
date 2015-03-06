<?php

	if (empty($_POST))
	{
	}
	else
	{
	$username = $_POST["InputUsername"];
	$mail = $_POST["InputMail"];
	$password = $_POST["InputPassword"];
	// $mail = $_POST["inputMail"];

	
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
		
		$stmp->execute(array(':username' => $username, ':password' => $password, ':mail' => $mail));
		$affected_rows = $stmp->rowCount();
	  echo $affected_rows;
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
	</div>
	
</body>
</html>

