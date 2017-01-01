<?php
include 'connection.php';
include 'loginFunction.php';
?>

<title>Register</title>

<form method='post'>
<?php
if(isset($_POST['register_button'])) {
	$username = $_POST['username'];
	$full_name = $_POST['full_name'];
	$secret_key = $_POST['secret_key'];
	$password = $_POST['password'];
	$confirm_password = $_POST['confirm_password'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$query = "INSERT INTO customers VALUES('','$first_name','$last_name','$username','$email','$password')";
	if(empty($username) or empty($full_name)) {
		echo 'Fields Missing!';
	}
	else {
		if(mysqli_query($connection,"INSERT INTO regcustomers (full_name,username,password,secret_key,phone_number,address)	VALUES('$full_name','$username','$password','$secret_key','$phone','$address')")){
			$_SESSION['customer_name']=$username;

			echo "happened";
		}else{
			echo "Error: in customerinfo "."<br>".mysqli_error($connection);
		}	
		echo "Successfully Registered!";
		$queryToGetPassword = mysqli_query($connection,"SELECT id FROM regCustomers WHERE username='$username'");
		$runqueryToGetPassword = mysqli_fetch_array($queryToGetPassword);
		$idFromQuery=$runqueryToGetPassword['id'];
		$_SESSION['cus_id']=$idFromQuery;
		header('location: homepage.php');
		}
	}
?>
Name: <br/>
<input type='text' name='full_name'/> 
<br/>
<br/>
User Name: <br/>
<input type='text' name='username'/>
<br/>
<br/>
Password: <br/>
<input type='password' name='password'/>
<br/>
<br/>
Confirm Password: <br/>
<input type='password' name='confirm_password'/>
<br/>
Address: <br/>
<input type='text' name='address'/>
<br/>
<br/>
Phone: <br/>
<input type='number_format' name='phone'/>
<br/>
<br/>
Secret question: <br/>
<input type='text' name='secret_key'/>
<input type='submit' value='Register' name='register_button'/>
</form>