<html>

<head>
	<title>Admin panel</title>
</head>

<body>
<?php
	include 'connection.php';
	include 'loginFunction.php';
?>
<h1>Hi this is the admin panel</h1>

<form  method="post">
    <input type="submit" name="cart" value="Show carts"/>
    <input type="submit" name="mobo" value="Show Motherboards"/>
    <input type="submit" name="cpu" value="Show cpu"/>
    <input type="submit" name="ram" value="Show ram"/>
    <input type="submit" name="hardisk" value="Show hdd"/>
    <input type="submit" name="orders" value="Show orders"/>
    
<?php
	if(isset($_POST['cart'])){
		echo '<br/>Pressed carts';
		}
	else if(isset($_POST['mobo'])){

		$id=mysqli_query($connection,"SELECT * FROM motherboard");
		$post=array();
		while($row=mysqli_fetch_assoc($id)){
			$post[]=$row;
		}
	?>

  <table border="2">
     <tr>
       <td>ID</td>
       <td>Name</td>
       <td>Price</td>
	   <td>Company</td>
       <td>Inventory</td>
     </tr>
     <?php foreach ($post as $row) : ?>
     <tr>
	 <?php foreach ($row as $element) : ?>
       <td><?php echo $element; ?></td>       
	   <?php endforeach; ?>
     </tr>
     <?php endforeach; ?>
   </table>
   <?php
	}else if(isset($_POST['cpu'])){
		$id=mysqli_query($connection,"SELECT * FROM cpu");
		$post=array();
		while($row=mysqli_fetch_assoc($id)){
			$post[]=$row;
		}
	?>

  <table border="2">
     <tr>
       <td>ID</td>
       <td>Name</td>
       <td>Price</td>
	   <td>Company</td>
       <td>Inventory</td>
     </tr>
     <?php foreach ($post as $row) : ?>
     <tr>
	 <?php foreach ($row as $element) : ?>
       <td><?php echo $element; ?></td>       
	   <?php endforeach; ?>
     </tr>
     <?php endforeach; ?>
   </table>
   <?php
	}else if(isset($_POST['ram'])){
		$id=mysqli_query($connection,"SELECT * FROM ram");
		$post=array();
		while($row=mysqli_fetch_assoc($id)){
			$post[]=$row;
		}
	?>

  <table border="2">
     <tr>
       <td>ID</td>
       <td>Name</td>
       <td>Price</td>
	   <td>Company</td>
       <td>Inventory</td>
       <td>Storage</td>
     </tr>
     <?php foreach ($post as $row) : ?>
     <tr>
	 <?php foreach ($row as $element) : ?>
       <td><?php echo $element; ?></td>       
	   <?php endforeach; ?>
     </tr>
     <?php endforeach; ?>
   </table>
   <?php
	}else if(isset($_POST['hardisk'])){
		$id=mysqli_query($connection,"SELECT * FROM hardisk");
		$post=array();
		while($row=mysqli_fetch_assoc($id)){
			$post[]=$row;
		}
	?>

  <table border="2">
     <tr>
       <td>ID</td>
       <td>Name</td>
       <td>Price</td>
	   <td>Company</td>
       <td>Inventory</td>
       <td>Storage</td>
     </tr>
     <?php foreach ($post as $row) : ?>
     <tr>
	 <?php foreach ($row as $element) : ?>
       <td><?php echo $element; ?></td>       
	   <?php endforeach; ?>
     </tr>
     <?php endforeach; ?>
   </table>
   <?php
	}
?>
</form>


<form method="post">
	Name: <input type="text" name="name" required />
	Price: <input type="text" name="price" required />
	Company: <input type="text" name="company" required />
	Inventory: <input type="text" name="inventory" required />
	Storage: <input type="text" name="storage" />
	<select name="unit">
    	<option  disabled>Choose here</option>
  		<option  value="motherboard">motherboard</option>
  		<option  value="cpu">cpu</option>
  		<option  value="ram">ram</option>
  		<option selected value="hardisk">hardisk</option>
	</select>
	<input type="submit" name="insert" value="input new inventory"/>
	
	<?php
		if(isset($_POST['insert'])){
			$nameinput=$_POST['name'];
			$priceinput=$_POST['price'];
			$companyinput=$_POST['company'];
			$inventoryinput=$_POST['inventory'];
			$storageinput=$_POST['storage'];
			$unitinput=$_POST['unit'];

			if($unitinput=='ram' || $unitinput=='hardisk'){
				if(mysqli_query($connection, "INSERT INTO $unitinput (name,price,company,inventory,storage) VALUES ('$nameinput',$priceinput,'$companyinput',$inventoryinput,$storageinput)" )) {
				
				}else{
				echo "Error: in "."<br>".mysqli_error($connection);
				}
			}
			else if(mysqli_query($connection, "INSERT INTO $unitinput (name,price,company,inventory) VALUES ('$nameinput',$priceinput,'$companyinput',$inventoryinput)" )) {
				
			}else{
				echo "Error: in  "."<br>".mysqli_error($connection);
			}
		}
	?>
</form>

<?php
		$query4=mysqli_query($connection,"SELECT regcustomers.full_name rname, regcustomers.phone_number rph, regcustomers.address radd,
		 orders.total_price ctp, motherboard.name mn, cpu.name cn, ram.name rn, hardisk.name hn
			FROM orders 
			join motherboard
			on orders.motherboard=motherboard.id 
			join cpu
			on orders.cpu = cpu.id
			join ram
			on orders.ram=ram.id
			join hardisk
			on orders.hardisk=hardisk.id
			join regcustomers
			on orders.customer_id=regcustomers.id");
		//$row=mysqli_fetch_assoc($query4);
	?>

  <table border="2">
     <tr>
       <td>Name of customer</td>
       <td>Phone number</td>
       <td>Address of customer</td>
	   <td>Total Price</td>
       <td>Motherboard</td>
       <td>CPU name</td>
       <td>RAM name</td>
       <td>HARDISK name</td>
     </tr>
          <?php
			
		while($row = $query4->fetch_array())
			{
		  ?>
    <tr>
       <td><?php echo $row['rname']; ?></td>
       <td><?php echo $row['rph']; ?></td>
       <td><?php echo $row['radd']; ?></td>
       <td><?php echo $row['ctp']; ?></td>
       <td><?php echo $row['mn']; ?></td>
       <td><?php echo $row['cn']; ?></td>
       <td><?php echo $row['rn']; ?></td>
       <td><?php echo $row['hn']; ?></td>
    </tr>
    <?php
		}
		?>

   </table>

   <a href=logout.php>Log Out</a>

</body>


</html>