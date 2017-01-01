<html>

<head>
	<title>Log in</title>
</head>

<body>
	<?php
		include 'connection.php';
		include 'loginFunction.php';
	?>	

<h3>Welcome!<h3>
	<?php
		if(loggedin()) {
			header('location: homepage.php');
		}
		else {
	?>
	<form action="loginCheck.php" method="POST">
		<input type="text" name="uname" required>
		<input type="password" name="psw" required>
		<button type="submit">Log In</button>
	</form>

	<?php
		}
	?>
</body>

</html>