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
	
		<form method="post" action="./index.php">
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
		  <button type="submit" class="btn btn-default">Submit</button>
		</form>
	
	</div>
</body>
</html>
