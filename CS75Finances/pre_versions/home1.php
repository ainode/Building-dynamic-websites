<?php 
    
/**
     * home.php
     *
     
*A simple home page for these login demos.
     *
    
* David J. Malan
     * Computer Science E-75
     
* Harvard Extension School
     */

    
// enable sessions
    
session_start();

error_reporting (E_ALL ^ E_NOTICE); 
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


<html xmlns="http://www.w3.org/1999/xhtml">
  
	<head>
    
	<title>Home</title>
  
	</head>
  
	<body>
    
		<h1>Home</h1>
    
		<h3>
      
<?php 			
			if ($_SESSION["authenticated"]) 
				{ 
?>
        
		<ul>
					You are logged in!  
 <br />

			<li>  <a href="logout.php">log out</a></li>

			<li><a href="show_stock.php">Check stock prices.</a></li>
      
			<li><a href="agprofile.php">Check your account.</a></li>
      
			<li><a href="show_stock.php">Buy stock.</a></li>
 
			<li><a href="agprofile.php">Sell stock.</a></li>
		</ul>
         
<?php 				
				} 
			else 	{ 
?>

    	    				You are not logged in!  <br />
      
		
<ul>
    
      
			<li><a href="login.php">Login.</a></li>
      
			<li><a href="show_stock.php">Check stock prices.</a></li>
   
		</ul>
		</h3>

<?php 
				} 
?>
    

</body>
</html>
