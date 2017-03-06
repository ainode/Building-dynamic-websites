<?php 
	session_start();
        $cart=$_SESSION["cart"];
	$keys=array_keys($cart);
	$qtys=array_values($_GET);
	$values_key=0;
	foreach ($keys as $key)
	  {
	    $qty=ltrim($qtys[$values_key],0);
	    $_SESSION["cart"][$key]=$qty;
	    $values_key++; 
	  }
	header("location:cart.php");
?>