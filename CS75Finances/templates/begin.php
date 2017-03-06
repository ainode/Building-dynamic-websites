<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

	<html xmlns="http://www.w3.org/1999/xhtml">
				
<head>
<link rel="stylesheet" type="text/css" href="includes/layout.css" />
<script type="text/javascript" src="includes/jsfuncs.js">
// <![CDATA[
onload=equalize;
	    // ]]>

	</script>
</head>

<body>
<?php
session_start();require "includes/include.php";error_reporting (E_ALL ^ E_NOTICE); ?> 

<div id="container" style="width:715px; height:100%;">
<div id="header" style="background-color:#FFA500;">
<div class="topmenu">
<ul>
<?php 

if ($_SESSION['authenticated'])
{
?>
<li onclick="show_quote_form();"><a href="#">Get a quote</a></li>
<li><a href="show_stock.php">Buy</a></li>
<li><a href="agprofile.php">Sell</a></li>
<li><a href="logout.php">Log out</a></li>
<?php } else {?>
<li onclick="show_quote_form();"><a href="#">Get a quote</a></li>
<?php }?>
</ul>
</div></div>
<div id="left" style="background-color:#FFD700;height:100%;width:100;float:left;">
<div id="left" style="background-color:#FFD700;height:100%;width:100;float:left;">
<br />
Get quotes<br />
News<br />
JavaScript
</div>
<div id="content" style="background-color:gray;height:100%;width:560px;float:left;">	  	
	 	<form action="<?php echo $_SERVER["PHP_SELF"];?>" name="stock" id="stock" method="get" style="display:none;" onsubmit="validation(); return false;">
			<b>Please enter the symbol of the stock.</b>
			<input name="symbol" id="symbol" type="text" />
			<input type="submit" value="submit" />			
		</form>	 

