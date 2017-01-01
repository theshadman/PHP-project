<html>

<head>
	<title>Details page</title>
	<link rel="stylesheet" type="text/css" href="mystyle.css">
</head>

<body>
<?php
	include 'connection.php';
	include 'loginFunction.php';
?>
<h1>Details Page</h1>
<table align="center" border="2" solid>
<tr>
	<td>Name</td>
	<td>Price</td>
	<td>Company</td>

</tr>
<tr>
<td>
<h3>
	<?php
		$accept=$_GET['serial'];
		$table=$_SESSION['table'];
		$query4=mysqli_query($connection,"SELECT * FROM $table WHERE id='$accept'");
		$row=mysqli_fetch_assoc($query4);
		echo $row['name'];
	?>
</h3>
</td>
<td>
<h3>
	<?php
		echo $row['price'];
	?>
</h3>
</td>
<td>
<h3>
	<?php
		echo $row['company'];
	?>
</h3>
</tr>
</table>

<?php
	$accept=$_GET['serial'];
	$table=$_SESSION['table'];
	echo $accept;
	echo $table;
?>



	<form  method="post">
	<h2  align="center">
    <input size="8" type="submit" name="add_to_cart" value="Add to cart"/>
    </h2>
    <h2 align="center">
    <input size="8" type="submit" name="Show_cart" value="Show cart"/>
    </h2>
<?php
	if(isset($_POST['add_to_cart'])){
		$id_of_customer=$_SESSION['cus_id'];
		$id_of_table=$_GET['serial'];
		$table_name=$_SESSION['table'];
		$query=mysqli_query($connection,"SELECT * FROM cart where customer_id='$id_of_customer'");
		if(mysqli_num_rows($query) > 0){//exists
			$query2=mysqli_query($connection,"UPDATE cart set $table_name='$id_of_table' where customer_id='$id_of_customer'");
			echo 'happened';
		}else{
			$qprice=mysqli_query($connection,"SELECT price from $table_name where id='$id_of_table'");
			$price=mysqli_fetch_assoc($qprice);
			$enprice=$price['price'];
			$query2=mysqli_query($connection,"INSERT INTO cart 
				(customer_id, $table_name, total_price) VALUES('$id_of_customer','$id_of_table','$enprice')");
			echo 'did not happen';

		}
		$price=0;
		$id=mysqli_query($connection,"SELECT motherboard,cpu,ram,hardisk FROM cart where customer_id='$id_of_customer'");
		$row=mysqli_fetch_assoc($id);

		if($row['motherboard']==0){

		}else{
			$query3=mysqli_query($connection,"SELECT price from motherboard where id='".$row['motherboard']."'");
			$id=mysqli_query($connection,"SELECT id,name,price,company FROM motherboard");
			$query3assoc=mysqli_fetch_assoc($query3);
			$price=$price+$query3assoc['price'];
		}
		if($row['cpu']==0){

		}else{
			$query3=mysqli_query($connection,"SELECT price from cpu where id='".$row['cpu']."'");
			$query3assoc=mysqli_fetch_assoc($query3);
			$price=$price+$query3assoc['price'];
		}
		if($row['ram']==0){

		}else{
			$query3=mysqli_query($connection,"SELECT price from ram where id='".$row['ram']."'");
			$query3assoc=mysqli_fetch_assoc($query3);
			$price=$price+$query3assoc['price'];
		}
		if($row['hardisk']==0){

		}else{
			$query3=mysqli_query($connection,"SELECT price from hardisk where id='".$row['hardisk']."'");
			$query3assoc=mysqli_fetch_assoc($query3);
			$price=$price+$query3assoc['price'];
		}

		if($query4=mysqli_query($connection,"UPDATE cart set total_price='$price' where customer_id='$id_of_customer'")){
			echo 'price updated';
		}else{
			echo 'price update failed';
		}
	}

	if(isset($_POST['Show_cart'])){
		header('location: showcart.php');
	}

?>

</br>
<!--this section should always be at the end-->
<?php
/*this  should always be in the end*/
	if(loggedin()) {
		?>
		<h4 align="center" >
		<a class="buttn" href=homepage.php>Go back</a> </h2>
		<h4 align="center" >
		<a align="center" class="buttn"  href=logout.php>Log Out</a>
		</h2>
		<?php
	}
	else {
?>
	<a href='prelogin.php'>Login</a> | <a href='register.php'>Register</a>
<?php
	}
?>
<!--this is for the log out part-->

</body>


</html>