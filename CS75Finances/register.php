<?php
require "include.php";
session_start();
	//check for the connection  
	if (($connection = mysql_connect(HOST, USER, PASS)) === FALSE)
            
	    die("Could not connect to database");
    
        
	  // select database
        
	if (mysql_select_db(DB, $connection) === FALSE)
            
	    die("Could not select database");
    
      
	//see if the user has filled out the fields
	if (isset ($_POST["email"]) && isset ($_POST["pass1"]))  	
	 { 
	  //put the values for name and pass in a variable
	  $name=mysql_real_escape_string($_POST["email"]);
	  $pass=mysql_real_escape_string($_POST["pass1"]);
	  //insert name and password and encrypt the password  
	  $sql="INSERT INTO users (id, name, pass)
	  VALUES
	  (NULL,'$name', AES_ENCRYPT('$pass','secret') )";
	  $result = mysql_query($sql);
        
	  if ($result === FALSE)
  
		die(mysql_error());  
	  $_SESSION['userid'] = $_POST["email"];
	  $_SESSION["authenticated"]=TRUE;
	  $host = $_SERVER["HTTP_HOST"];
            
		$path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
            
		header("Location: http://$host$path/home.php");
            
		exit;
  
	}
	
?>

