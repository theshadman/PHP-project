<html>

<head>
	<title>Show cart page</title>
	<link rel="stylesheet" type="text/css" href="mystyle.css">
</head>

<body>
<?php
	include 'connection.php';
	include 'loginFunction.php';
	
	?>

<h1>This is the show cart page.</h1>
<?php
	$sas=$_SESSION['cus_id'];
	echo $sas;
?>
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
		$sas=$_SESSION['cus_id'];
		$query4=mysqli_query($connection,"SELECT cart.total_price ctp, motherboard.name mn, motherboard.price mp, motherboard.company mc,
		 	cpu.name cn, cpu.price cp, cpu.company cc,
		 	ram.name rn, ram.price rp, ram.company rc,
		 	hardisk.name hn, hardisk.price hp, hardisk.company hc
			FROM cart 
			join motherboard
			on cart.motherboard=motherboard.id 
			join cpu
			on cart.cpu = cpu.id
			join ram
			on cart.ram=ram.id
			join hardisk
			on cart.hardisk=hardisk.id
		 	WHERE cart.customer_id='$sas'");
		
		$row=mysqli_fetch_assoc($query4);
		echo $row['mn'];
	?>
</h3>
</td>
<td>
<h3>
	<?php
		echo $row['mp'];
	?>
</h3>
</td>
<td>
<h3>
	<?php
		echo $row['mc'];
	?>
</h3>
</td>
</tr>

<tr>
	<td>
	<h3>
	<?php
		echo $row['cn'];
	?>
	</h3>
	</td>
	<td>
	<h3>
	<?php
		echo $row['cp'];
	?>
	</h3>
	</td>
	<td>
	<h3>
	<?php
		echo $row['cc'];
	?>
	</h3>
	</td>
</tr>

<tr>
	<td>
	<h3>
	<?php
		echo $row['rn'];
	?>
	</h3>
	</td>
	<td>
	<h3>
	<?php
		echo $row['rp'];
	?>
	</h3>
	</td>
	<td>
	<h3>
	<?php
		echo $row['rc'];
	?>
	</h3>
	</td>
</tr>

<tr>
	<td>
	<h3>
	<?php
		echo $row['hn'];
	?>
	</h3>
	</td>
	<td>
	<h3>
	<?php
		echo $row['hp'];
	?>
	</h3>
	</td>
	<td>
	<h3>
	<?php
		echo $row['hc'];
	?>
	</h3>
	</td>
</tr>
</table>
<h3 align="center">
	Total Price=<?php echo $row['ctp']; ?>
</h3>

<form  method="post">
	<h2  align="center">
    <input size="8" type="submit" name="order" value="ORDER"/>
    </h2>
    <?php
    if(isset($_POST['order'])){
    	$sas=$_SESSION['cus_id'];
    	$query6=mysqli_query($connection,"SELECT * from orders where customer_id='$sas'");    	
    	if(mysqli_num_rows($query6)>0){
    		$query9=mysqli_query($connection,"SELECT * from cart where customer_id='$sas'");   
    		$row=mysqli_fetch_assoc($query9);
    		$query7=mysqli_query($connection,"UPDATE orders set motherboard='".$row['motherboard']."' , cpu='".$row['cpu']."' , ram='".$row['ram']."', hardisk='".$row['hardisk']."', total_price='".$row['total_price']."'
    				 where customer_id='$sas'");
    		echo 'orders updated';
    	}else{
    		$query6=mysqli_query($connection,"SELECT * from cart where customer_id='$sas'"); 
    		$row1=mysqli_fetch_assoc($query6);
    		echo $query8=mysqli_query($connection,"INSERT INTO orders (customer_id,motherboard,cpu,ram,hardisk,total_price) VALUES 
    			('".$row1['customer_id']."',
    			'".$row1['motherboard']."' ,
    			 '".$row1['cpu']."' ,
    			  '".$row1['ram']."',
    			   '".$row1['hardisk']."',
    			   '".$row1['total_price']."' )");
    		echo $row1['cpu'];
    		echo 'ADDED TO ORDER.';
    	}
    }
    ?>
</form>

<?php
/*this  should always be in the end*/
	if(loggedin()) {
		?>
		<h4 align="center" >
		<a class="buttn" href=homepage.php>Go back</a> </h2>
		<h4 align="center" >
		<a align="center" class="buttn"  href=logout.php>Log Out</a>
		</h4>
		<?php
	}
	else {
?>
	<a href='prelogin.php'>Login</a> | <a href='register.php'>Register</a>
<?php
	}
?>



</body>
</html>