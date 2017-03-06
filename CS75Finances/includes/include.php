<?php

   // Here we define some of the constants
    
	define("HOST", "localhost");
    
	define("USER", "ali");
    
	define("PASS", "bigblue");

	
	// define the database name
	
	define("DB", "cs75finance");
	//check for the connection  
	if (($connection = mysql_connect(HOST, USER, PASS)) === FALSE)
            
	    die("Could not connect to database");
    
        
	  // select database
        
	if (mysql_select_db(DB, $connection) === FALSE)
            
	    die("Could not select database");
 