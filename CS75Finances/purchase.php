<?php
	require "templates/begin.php";
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
			else 
				{
					$_SESSION['complete'] = TRUE;					
					header("Location:home.php");
				}
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
	require "templates/end.php";
?>
