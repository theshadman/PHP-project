<html>

<head>
	<title>Homepage</title>
</head>

<body>
<?php
	include 'connection.php';
	include 'loginFunction.php';
?>
<h1>Hi hompage</h1>

<form method="post">
	<input type="text" name="searchBar">
	<input type="submit" name="searchBarSearch" value="Search">
	<?php
	 if(isset($_POST['searchBarSearch'])){

		/*$id=mysqli_query($connection,"SELECT  *
		    FROM motherboard JOIN ram JOIN cpu JOIN hardisk  WHERE (motherboard.name like '%SKILL%') or (ram.name like '%SKILL%') 
			or (cpu.name like '%SKILL%') or (hardisk.name like '%SKILL%')  or (ram.company like '%SKILL%') or (motherboard.company like '%SKILL%') 
			or (cpu.company like '%SKILL%') or (hardisk.company like '%SKILL%')")*/
		$id=mysqli_query($connection," SELECT id,name,price,company FROM cpu WHERE name like '%".$_POST['searchBar']."%' or company like '%".$_POST['searchBar']."%'
			UNION SELECT id,name,price,company FROM motherboard WHERE name like '%".$_POST['searchBar']."%' or company like '%".$_POST['searchBar']."%'
			UNION SELECT id,name,price,company FROM hardisk WHERE name like '%".$_POST['searchBar']."%' or company like '%".$_POST['searchBar']."%'
			UNION SELECT id,name,price,company FROM ram WHERE name like '%".$_POST['searchBar']."%' or company like '%".$_POST['searchBar']."%' ");

		$post=array();
		while($row=mysqli_fetch_assoc($id)){
			$post[]=$row;
		}
	?>

  <table border="2">
     <tr>
       <td>ID</td>  <td>Name</td>
       <td>Price</td>
	   <td>Company</td>
     </tr>
     <?php foreach ($post as $row) : ?>
     <tr>
	 <?php $var=1;$send=''; foreach ($row as $element) : ?>
       <td>
       <?php
       if($var<3){
       	if($var==1){
       			$send=$element;
       	}
       		$var++;	
       		echo('<a href="details.php?serial='.$send.'">'.$element.'</a>');
   		}
   		else{
   			echo $element;   			
   		}
       ?>
       </td>        
	   <?php endforeach; ?>
     </tr>
     <?php endforeach; ?>
   </table>
   <?php
	}else{

	}?>

</form>

<form  method="post">
    <input type="submit" name="cart" value="Show cart"/>
    <input type="submit" name="mobo" value="Show Motherboards"/>
    <input type="submit" name="cpu" value="Show cpu"/>
    <input type="submit" name="ram" value="Show ram"/>
    <input type="submit" name="hardisk" value="Show hdd"/>
    
<?php
	if(isset($_POST['cart'])){
		header('location: showcart.php');
		}
	else if(isset($_POST['mobo'])){
		$_SESSION['table']='motherboard';
		$id=mysqli_query($connection,"SELECT id,name,price,company FROM motherboard");
		
		$post=array();
		while($row=mysqli_fetch_assoc($id)){
			$post[]=$row;
		}

	?>

  <table border="2">
     <tr>
       <td>ID</td>  <td>Name</td>
       <td>Price</td>
	   <td>Company</td>
     </tr>
     <?php foreach ($post as $row) : ?>
     <tr>
	 <?php $var=1;$send=''; foreach ($row as $element) : ?>
       <td>
       <?php
       if($var<3){
       	if($var==1){
       			$send=$element;
       	}
       		$var++;
       		
       		echo('<a href="details.php?serial='.$send.'">'.$element.'</a>');
   		}
   		else{
   			echo $element;   			
   		}
       ?>
       </td>       
	   <?php endforeach; ?>
     </tr>
     <?php endforeach; ?>
   </table>
   <?php
	}else if(isset($_POST['cpu'])){
		$_SESSION['table']='cpu';
		$id=mysqli_query($connection,"SELECT id,name,price,company FROM cpu");
		$post=array();
		while($row=mysqli_fetch_assoc($id)){
			$post[]=$row;
		}
	?>

  <table border="2">
     <tr>
       <td>ID</td>  <td>Name</td>
       <td>Price</td>
	   <td>Company</td>
     </tr>
     <?php foreach ($post as $row) : ?>
     <tr>
	 <?php $var=1;$send=''; foreach ($row as $element) : ?>
       <td>
       <?php
       if($var<3){
       	if($var==1){
       			$send=$element;
       	}
       		$var++;	
       		echo('<a href="details.php?serial='.$send.'">'.$element.'</a>');
   		}
   		else{
   			echo $element;   			
   		}
       ?>
       </td>        
	   <?php endforeach; ?>
     </tr>
     <?php endforeach; ?>
   </table>
   <?php
	}else if(isset($_POST['ram'])){
		$_SESSION['table']='ram';
		$id=mysqli_query($connection,"SELECT id,name,price,company,storage FROM ram");
		$post=array();
		while($row=mysqli_fetch_assoc($id)){
			$post[]=$row;
		}
	?>

  <table border="2">
     <tr>
       <td>ID</td>  <td>Name</td>
       <td>Price</td>
	   <td>Company</td>
       <td>Storage</td>
     </tr>
     <?php foreach ($post as $row) : ?>
     <tr>
	 <?php $var=1;$send=''; foreach ($row as $element) : ?>
       <td>
       <?php
       if($var<3){
       	if($var==1){
       			$send=$element;
       	}
       		$var++;	
       		echo('<a href="details.php?serial='.$send.'">'.$element.'</a>');
   		}
   		else{
   			echo $element;   			
   		}
       ?>
       </td>        
	   <?php endforeach; ?>
     </tr>
     <?php endforeach; ?>
   </table>
   <?php
	}else if(isset($_POST['hardisk'])){
		$_SESSION['table']='hardisk';
		$id=mysqli_query($connection,"SELECT id,name, price, company, storage FROM hardisk");
		$post=array();
		while($row=mysqli_fetch_assoc($id)){
			$post[]=$row;
		}
	?>

  <table border="2">
     <tr>
       <td>ID</td>  <td>Name</td>
       <td>Price</td>
	   <td>Company</td>
       <td>Storage</td>
     </tr>
     <?php foreach ($post as $row) : ?>
     <tr>
	 <?php $var=1;$send=''; foreach ($row as $element) : ?>
       <td>
       <?php
       if($var<3){
       	if($var==1){
       			$send=$element;
       	}
       		$var++;	
       		echo('<a href="details.php?serial='.$send.'">'.$element.'</a>');
   		}
   		else{
   			echo $element;   			
   		}
       ?>
       </td>        
	   <?php endforeach; ?>
     </tr>
     <?php endforeach; ?>
   </table>
   <?php
	}
?>
</form>


<form method="post">
	<select name="unit">
    	<option selected disabled>Choose here</option>
  		<option value="motherboard">motherboard</option>
  		<option value="cpu">cpu</option>
  		<option value="ram">ram</option>
  		<option value="hardisk">hardisk</option>
	</select>
	<select name="sortOrder">
    	<option selected disabled>Choose here</option>
  		<option value="pricehitolo">Price(high>low)</option>
  		<option value="pricelotohi">Price(low>high)</option>
  		<option value="nameatoz">Name(a-z)</option>
  		<option value="nameztoa">Name(z-a)</option>
	</select>
	<select name="priceRange">
    	<option value="default" selected>0 to Infinity</option>
  		<option value="tento20">10k to 20k</option>
  		<option value="twentyto30">20k to 30k</option>
  		<option value="thirtyto40">30k to 40k</option>
  		<option value="fourtyto50">40k to 50k</option>
  		<option value="fiftyandabove">More than 50k</option>
	</select>
	<input type="submit" name="sort">
	<?php
		if(isset($_POST['sort'])){
			if(isset($_POST['unit'])){
				if($_POST['unit']=='hardisk' || $_POST['unit']=='motherboard' || $_POST['unit']=='cpu' || $_POST['unit']=='ram'){
					$_SESSION['table']=$_POST['unit'];					
				}
				if(isset($_POST['sortOrder'])){
					if($_POST['sortOrder']=='pricehitolo' || $_POST['sortOrder']=='pricelotohi'){//sort by price
						if($_POST['sortOrder']=='pricehitolo'){//sorting high to low price
							$id=mysqli_query($connection,"SELECT id,name,price,company FROM ".$_POST['unit']." order by price desc");
							$post=array();
							while($row=mysqli_fetch_assoc($id)){
								$post[]=$row;
							}
							?>
							<table border="2">
     						<tr>
       							<td>ID</td>  <td>Name</td>
       							<td>Price</td>
	   							<td>Company</td>
     						</tr>
     						<?php foreach ($post as $row) : ?>
     						<tr
>	 						<?php $var=1;$send=''; foreach ($row as $element) : ?>
       							<td>
       <?php
       if($var<3){
       	if($var==1){
       			$send=$element;
       	}
       		$var++;	
       		echo('<a href="details.php?serial='.$send.'">'.$element.'</a>');
   		}
   		else{
   			echo $element;   			
   		}
       ?>
       </td>        
	   						<?php endforeach; ?>
     						</tr>
     						<?php endforeach; ?>
   							</table><?php
						}else{//sorting low to high price
							$id=mysqli_query($connection,"SELECT id,name,price,company FROM ".$_POST['unit']." order by price asc");
							$post=array();
							while($row=mysqli_fetch_assoc($id)){
								$post[]=$row;
							}
							?>
							<table border="2">
     						<tr>
       							<td>ID</td>  <td>Name</td>
       							<td>Price</td>
	   							<td>Company</td>
     						</tr>
     						<?php foreach ($post as $row) : ?>
     						<tr>
	 						<?php $var=1;$send=''; foreach ($row as $element) : ?>
       							<td>
       <?php
       if($var<3){
       	if($var==1){
       			$send=$element;
       	}
       		$var++;	
       		echo('<a href="details.php?serial='.$send.'">'.$element.'</a>');
   		}
   		else{
   			echo $element;   			
   		}
       ?>
       </td>        
	   						<?php endforeach; ?>
     						</tr>
     						<?php endforeach; ?>
   							</table><?php
						}
					}else{//sort by name may use price
						if(isset($_POST['priceRange']) && $_POST['priceRange']!='default'){//selected price range and sorting my name maybe

							if($_POST['sortOrder']=='nameatoz'){

							if($_POST['priceRange']=='tento20'){//                10                          20

							$id=mysqli_query($connection,"SELECT id,name,price,company FROM ".$_POST['unit']." where price between 10000 and 20000 order by name desc");
							$post=array();
							while($row=mysqli_fetch_assoc($id)){
								$post[]=$row;
							}
							?>
							<table border="2">
     						<tr>
       							<td>ID</td>  <td>Name</td>
       							<td>Price</td>
	   							<td>Company</td>
     						</tr>
     						<?php foreach ($post as $row) : ?>
     						<tr>
	 						<?php $var=1;$send=''; foreach ($row as $element) : ?>
       							<td>
       <?php
       if($var<3){
       	if($var==1){
       			$send=$element;
       	}
       		$var++;	
       		echo('<a href="details.php?serial='.$send.'">'.$element.'</a>');
   		}
   		else{
   			echo $element;   			
   		}
       ?>
       </td>        
	   						<?php endforeach; ?>
     						</tr>
     						<?php endforeach; ?>
   							</table><?php

							}else if($_POST['priceRange']=='twentyto30'){//             20                     30

							$id=mysqli_query($connection,"SELECT id,name,price,company FROM ".$_POST['unit']." where price between 20000 and 30000 order by name desc");
							$post=array();
							while($row=mysqli_fetch_assoc($id)){
								$post[]=$row;
							}
							?>
							<table border="2">
     						<tr>
       							<td>ID</td>  <td>Name</td>
       							<td>Price</td>
	   							<td>Company</td>
     						</tr>
     						<?php foreach ($post as $row) : ?>
     						<tr>
	 						<?php $var=1;$send=''; foreach ($row as $element) : ?>
       							<td>
       <?php
       if($var<3){
       	if($var==1){
       			$send=$element;
       	}
       		$var++;	
       		echo('<a href="details.php?serial='.$send.'">'.$element.'</a>');
   		}
   		else{
   			echo $element;   			
   		}
       ?>
       </td>        
	   						<?php endforeach; ?>
     						</tr>
     						<?php endforeach; ?>
   							</table><?php

							}else if($_POST['priceRange']=='thirtyto40'){//        30         40

							$id=mysqli_query($connection,"SELECT id,name,price,company FROM ".$_POST['unit']." where price between 30000 and 40000 order by name desc");
							$post=array();
							while($row=mysqli_fetch_assoc($id)){
								$post[]=$row;
							}
							?>
							<table border="2">
     						<tr>
       							<td>ID</td>  <td>Name</td>
       							<td>Price</td>
	   							<td>Company</td>
     						</tr>
     						<?php foreach ($post as $row) : ?>
     						<tr>
	 						<?php $var=1;$send=''; foreach ($row as $element) : ?>
       							<td>
       <?php
       if($var<3){
       	if($var==1){
       			$send=$element;
       	}
       		$var++;	
       		echo('<a href="details.php?serial='.$send.'">'.$element.'</a>');
   		}
   		else{
   			echo $element;   			
   		}
       ?>
       </td>        
	   						<?php endforeach; ?>
     						</tr>
     						<?php endforeach; ?>
   							</table><?php

							}else if($_POST['priceRange']=='fourtyto50'){//                40                      50

							$id=mysqli_query($connection,"SELECT id,name,price,company FROM ".$_POST['unit']." where price between 40000 and 50000 order by name desc");
							$post=array();
							while($row=mysqli_fetch_assoc($id)){
								$post[]=$row;
							}
							?>
							<table border="2">
     						<tr>
       							<td>ID</td>  <td>Name</td>
       							<td>Price</td>
	   							<td>Company</td>
     						</tr>
     						<?php foreach ($post as $row) : ?>
     						<tr>
	 						<?php $var=1;$send=''; foreach ($row as $element) : ?>
       							<td>
       <?php
       if($var<3){
       	if($var==1){
       			$send=$element;
       	}
       		$var++;	
       		echo('<a href="details.php?serial='.$send.'">'.$element.'</a>');
   		}
   		else{
   			echo $element;   			
   		}
       ?>
       </td>        
	   						<?php endforeach; ?>
     						</tr>
     						<?php endforeach; ?>
   							</table><?php

							}else if($_POST['priceRange']=='fiftyandabove'){//                        50                      above

							$id=mysqli_query($connection,"SELECT id,name,price,company FROM ".$_POST['unit']." where price>50000 order by name desc");
							$post=array();
							while($row=mysqli_fetch_assoc($id)){
								$post[]=$row;
							}
							?>
							<table border="2">
     						<tr>
       							<td>ID</td>  <td>Name</td>
       							<td>Price</td>
	   							<td>Company</td>
     						</tr>
     						<?php foreach ($post as $row) : ?>
     						<tr>
	 						<?php $var=1;$send=''; foreach ($row as $element) : ?>
       							<td>
       <?php
       if($var<3){
       	if($var==1){
       			$send=$element;
       	}
       		$var++;	
       		echo('<a href="details.php?serial='.$send.'">'.$element.'</a>');
   		}
   		else{
   			echo $element;   			
   		}
       ?>
       </td>        
	   						<?php endforeach; ?>
     						</tr>
     						<?php endforeach; ?>
   							</table><?php

							}
						}else{//did not select name order....................
							if($_POST['priceRange']=='tento20'){//                10                          20

							$id=mysqli_query($connection,"SELECT id,name,price,company FROM ".$_POST['unit']." where price between 10000 and 20000 order by name asc");
							$post=array();
							while($row=mysqli_fetch_assoc($id)){
								$post[]=$row;
							}
							?>
							<table border="2">
     						<tr>
       							<td>ID</td>  <td>Name</td>
       							<td>Price</td>
	   							<td>Company</td>
     						</tr>
     						<?php foreach ($post as $row) : ?>
     						<tr>
	 						<?php $var=1;$send=''; foreach ($row as $element) : ?>
       							<td>
       <?php
       if($var<3){
       	if($var==1){
       			$send=$element;
       	}
       		$var++;	
       		echo('<a href="details.php?serial='.$send.'">'.$element.'</a>');
   		}
   		else{
   			echo $element;   			
   		}
       ?>
       </td>        
	   						<?php endforeach; ?>
     						</tr>
     						<?php endforeach; ?>
   							</table><?php

							}else if($_POST['priceRange']=='twentyto30'){//             20                     30

							$id=mysqli_query($connection,"SELECT id,name,price,company FROM ".$_POST['unit']." where price between 20000 and 30000 order by name asc");
							$post=array();
							while($row=mysqli_fetch_assoc($id)){
								$post[]=$row;
							}
							?>
							<table border="2">
     						<tr>
       							<td>ID</td>  <td>Name</td>
       							<td>Price</td>
	   							<td>Company</td>
     						</tr>
     						<?php foreach ($post as $row) : ?>
     						<tr>
	 						<?php $var=1;$send=''; foreach ($row as $element) : ?>
       							<td>
       <?php
       if($var<3){
       	if($var==1){
       			$send=$element;
       	}
       		$var++;	
       		echo('<a href="details.php?serial='.$send.'">'.$element.'</a>');
   		}
   		else{
   			echo $element;   			
   		}
       ?>
       </td>        
	   						<?php endforeach; ?>
     						</tr>
     						<?php endforeach; ?>
   							</table><?php

							}else if($_POST['priceRange']=='thirtyto40'){//        30         40

							$id=mysqli_query($connection,"SELECT id,name,price,company FROM ".$_POST['unit']." where price between 30000 and 40000 order by name asc");
							$post=array();
							while($row=mysqli_fetch_assoc($id)){
								$post[]=$row;
							}
							?>
							<table border="2">
     						<tr>
       							<td>ID</td>  <td>Name</td>
       							<td>Price</td>
	   							<td>Company</td>
     						</tr>
     						<?php foreach ($post as $row) : ?>
     						<tr>
	 						<?php $var=1;$send=''; foreach ($row as $element) : ?>
       							<td>
       <?php
       if($var<3){
       	if($var==1){
       			$send=$element;
       	}
       		$var++;	
       		echo('<a href="details.php?serial='.$send.'">'.$element.'</a>');
   		}
   		else{
   			echo $element;   			
   		}
       ?>
       </td>        
	   						<?php endforeach; ?>
     						</tr>
     						<?php endforeach; ?>
   							</table><?php

							}else if($_POST['priceRange']=='fourtyto50'){//                40                      50

							$id=mysqli_query($connection,"SELECT id,name,price,company FROM ".$_POST['unit']." where price between 40000 and 50000 order by name asc");
							$post=array();
							while($row=mysqli_fetch_assoc($id)){
								$post[]=$row;
							}
							?>
							<table border="2">
     						<tr>
       							<td>ID</td>  <td>Name</td>
       							<td>Price</td>
	   							<td>Company</td>
     						</tr>
     						<?php foreach ($post as $row) : ?>
     						<tr>
	 						<?php $var=1;$send=''; foreach ($row as $element) : ?>
       							<td>
       <?php
       if($var<3){
       	if($var==1){
       			$send=$element;
       	}
       		$var++;	
       		echo('<a href="details.php?serial='.$send.'">'.$element.'</a>');
   		}
   		else{
   			echo $element;   			
   		}
       ?>
       </td>        
	   						<?php endforeach; ?>
     						</tr>
     						<?php endforeach; ?>
   							</table><?php

							}else if($_POST['priceRange']=='fiftyandabove'){//                        50                      above

							$id=mysqli_query($connection,"SELECT id,name,price,company FROM ".$_POST['unit']." where price>50000 order by name asc");
							$post=array();
							while($row=mysqli_fetch_assoc($id)){
								$post[]=$row;
							}
							?>
							<table border="2">
     						<tr>
       							<td>ID</td>  <td>Name</td>
       							<td>Price</td>
	   							<td>Company</td>
     						</tr>
     						<?php foreach ($post as $row) : ?>
     						<tr>
	 						<?php $var=1;$send=''; foreach ($row as $element) : ?>
       							<td>
       <?php
       if($var<3){
       	if($var==1){
       			$send=$element;
       	}
       		$var++;	
       		echo('<a href="details.php?serial='.$send.'">'.$element.'</a>');
   		}
   		else{
   			echo $element;   			
   		}
       ?>
       </td>        
	   						<?php endforeach; ?>
     						</tr>
     						<?php endforeach; ?>
   							</table><?php
   						}
						}//ends here ..........................
						}else{//did not select price range so just sort by name

						if($_POST['sortOrder']=='nameatoz'){//just sort by name - a to z
							$id=mysqli_query($connection,"SELECT id,name,price,company FROM ".$_POST['unit']." order by name asc");
							$post=array();
							while($row=mysqli_fetch_assoc($id)){
								$post[]=$row;
							}
							?>
							<table border="2">
     						<tr>
       							<td>ID</td>  <td>Name</td>
       							<td>Price</td>
	   							<td>Company</td>
     						</tr>
     						<?php foreach ($post as $row) : ?>
     						<tr>
	 						<?php $var=1;$send=''; foreach ($row as $element) : ?>
       							<td>
       <?php
       if($var<3){
       	if($var==1){
       			$send=$element;
       	}
       		$var++;	
       		echo('<a href="details.php?serial='.$send.'">'.$element.'</a>');
   		}
   		else{
   			echo $element;   			
   		}
       ?>
       </td>        
	   						<?php endforeach; ?>
     						</tr>
     						<?php endforeach; ?>
   							</table><?php

							}else{//just sort by name price not selected - z to a

							$id=mysqli_query($connection,"SELECT id,name,price,company FROM ".$_POST['unit']." order by name desc");
							$post=array();
							while($row=mysqli_fetch_assoc($id)){
								$post[]=$row;
							}
							?>
							<table border="2">
     						<tr>
       							<td>ID</td>  <td>Name</td>
       							<td>Price</td>
	   							<td>Company</td>
     						</tr>
     						<?php foreach ($post as $row) : ?>
     						<tr>
	 						<?php $var=1;$send=''; foreach ($row as $element) : ?>
       							<td>
       <?php
       if($var<3){
       	if($var==1){
       			$send=$element;
       	}
       		$var++;	
       		echo('<a href="details.php?serial='.$send.'">'.$element.'</a>');
   		}
   		else{
   			echo $element;   			
   		}
       ?>
       </td>        
	   						<?php endforeach; ?>
     						</tr>
     						<?php endforeach; ?>
   							</table><?php
							}
						}
					}
				}
			}
		}
	?>

</form>



<!--this section should always be at the end-->
<?php
/*this  should always be in the end*/
	if(loggedin()) {
		echo 'Logged in! <a href=logout.php>Log Out</a>';
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