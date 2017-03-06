<?php
	session_start();
	require "includes/include.php";
	if (isset ($_POST["stockname"]) && isset ($_POST["stocknum"]) && isset ($_POST["stockprice"])) 	
	 { 
	  //define variables and assign values from post variable from show_stock page 
	  $user_id = $_SESSION['userid'];
	  $num_id=$_SESSION['num_id'];
	  $stockname=$_POST["stockname"];
	  $stocknum=$_POST["stocknum"];
	  $stockprice=$_POST["stockprice"]; 
	  $purchase=$stockprice*$stocknum;
	  $sql_funds = mysql_query("SELECT cash FROM users WHERE name = '$user_id'");
	  $sqlarray_funds=mysql_fetch_array($sql_funds);
	  $funds=$sqlarray_funds["cash"];
	  //if sufficient money is available
	  if ($funds > $purchase)
		{	
			//insert new values of new stocks purchased into the shares table
	  		$sql="INSERT INTO shares (user_id, stock_symbol, share_price, share_quantity, quantity_left)
	  		VALUES
	  		('$num_id','$stockname', '$stockprice' , '$stocknum' , '$stocknum')";
	  		$result1 = mysql_query($sql);
        
	  		$result2 =mysql_query(" UPDATE users SET cash =  cash-$purchase WHERE name = '$user_id'");
			if ($result1 === FALSE || $result2 === FALSE)
				die(mysql_error());
	  	}
	  else
		{
	  		
?>
			<b><a href="agprofile.php">See your profile.</a><br />
<?php			
			//in case amount of money available is less than value of shares
			die("Sufficient funds not available.");
	  	}
			
	 }
?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

		
<html xmlns="http://www.w3.org/1999/xhtml">
				
		   <body>
			<b>Transaction completed<b></ br>
			<ul>
				<li><a href="agprofile.php">Go to profile</a></li>
				<li><a href="show_stock.php">Get a quote/Buy</a></li>
				<li><a href="profile.php">Show history</a></li>
				<li><a href="agprofile.php">Sell</a></li>
			</ul>

 