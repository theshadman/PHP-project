<html>

<head>
	<title>Index</title>
</head>

<body>
	<?php
		include 'connection.php';
		include 'loginFunction.php';
	?>	

<h3>Weelcome!<h3>
	<?php
		if(loggedin()) {
			echo 'Logged in! <a href=logout.php>Log Out</a>';
		}
		else {
	?>
	<a href='prelogin.php'>Login</a> | <a href='register.php'>Register</a>
	<?php
		}
	?>
</body>

</html>