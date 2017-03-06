<?php
    
/**
     * login8.php
     *
     * A simple login module that checks a username and password
     
* against a MySQL table with strong encryption (but insecure secret).
     *
     
* David J. Malan
     * Dan Armendariz
     * Computer Science E-75
     
* Harvard Extension School
     */

    
	require "includes/include.php";
	session_start();
  // if username and password were submitted, check them
    
  if (isset($_POST["user"]) && isset($_POST["pass"]))
    
	{
        
	  // connect to database
        
	  if (($connection = mysql_connect(HOST, USER, PASS)) === FALSE)
            
	    die("Could not connect to database");
    
        
	  // select database
        
	  if (mysql_select_db(DB, $connection) === FALSE)
            
	    die("Could not select database");
    
      
	  //change the password in the database to encrypted    
	  mysql_query("UPDATE users SET pass = AES_ENCRYPT('pass','secret') WHERE name = 'name'");    
	  // prepare SQL
        
	  $sql = sprintf("SELECT * FROM users WHERE name='%s' AND pass=AES_ENCRYPT('%s', 'secret')",
 
	  mysql_real_escape_string($_POST["user"]), mysql_real_escape_string($_POST["pass"]));


          // execute query
        
	  $result = mysql_query($sql);
        
	  if ($result === FALSE)
  
		          
	    die("Could not query database");


		       
	  // check whether we found a row
        
	  if (mysql_num_rows($result) == 1)
        
	    {
             
		$id_sql = mysql_fetch_array($result);
		// remember id of the user to be used for different queries in php pages
		$_SESSION['num_id'] = $id_sql["id"];
		// remember that user's logged in
            
		$_SESSION['authenticated'] = TRUE;
		// remember user's name
		$_SESSION['userid']= $_POST["user"];         
		// redirect user to home page, using absolute path, per
            
		// http://us2.php.net/manual/en/function.header.php
            
		$host = $_SERVER["HTTP_HOST"];
            
		$path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
            
		header("Location: http://$host$path/home.php");
            
		exit;
        
	     }  
	   else echo "nope"; 
	 }

?>

