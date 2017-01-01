<html>

<head>
	<title>AdminCheck</title>
</head>

<body>
	<?php
		include 'connection.php';
		include 'loginFunction.php';
	?>	
<form method='post'>
<?php

if(isset($_POST['login_button'])) {
	$name=$_POST['name'];
	$queryToGetSecKey = mysqli_query($connection,"SELECT secret_key FROM regCustomers WHERE username='admin'");
	$runqueryToGetSecKey = mysqli_fetch_array($queryToGetSecKey);
	if($name==$runqueryToGetSecKey['secret_key']){
		$_SESSION['customer_name']=$username;
		header('location: adminPanel.php');
	}
}?>
	
	<div class="log_in_section">
		Secret Code:<br/>
		<input type='text' name='name'/>		
		<br/>
		<input type='submit' name='login_button' value='Input'/>
	</div>
	</form>
</body>

</html>