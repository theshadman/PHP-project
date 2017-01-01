<html>
<head>
	<title></title>
</head>
<body>
	<?php
		include 'connection.php';
		include 'loginFunction.php';
		if(loggedin()) {
			if($_SESSION['customer_name']==='admin'){
				header('location : adminPanel.php');
			}else{
				header('location : homepage.php');
			}
		}
	?>
	<?php 
		$username=$_POST['uname'];
		$password=$_POST['psw'];
		$forAdmin='admin';
		$queryToGetPassword = mysqli_query($connection,"SELECT id,password FROM regCustomers WHERE username='$username'");

		if(mysqli_num_rows($queryToGetPassword)==0){
			?>
			<h1>wrong information. please log in again.</h1>
			<form action="loginCheck.php" method="POST">
				<input type="text" name="uname" required>
				<input type="password" name="psw" required>
				<button type="submit">Log In</button>
			</form>
			<?php
		}
		else{
		$runqueryToGetPassword = mysqli_fetch_array($queryToGetPassword);
		$pass = $runqueryToGetPassword['password'];
		$idFromQuery=$runqueryToGetPassword['id'];
		if($pass==$password){
			$_SESSION['customer_name']=$username;
			$_SESSION['cus_id']=$idFromQuery;
			if($username==$forAdmin){
				header('location: adminCheck.php');
			}else{
				header('location: homepage.php');
			}
		}else{
			?>
			<h1>wrong information. please log in again.</h1>
			<form action="loginCheck.php" method="POST">
				<input type="text" name="uname" required>
				<input type="password" name="psw" required>
				<button type="submit">Log In</button>
			</form>
			<?php
			}
		}
	?>

</body>
</html>
