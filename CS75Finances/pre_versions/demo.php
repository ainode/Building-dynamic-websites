<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

	<html xmlns="http://www.w3.org/1999/xhtml">
				
<head>

<script type="text/javascript" src="../includes/jsfuncs.js">
// <![CDATA[

	    // ]]>

	</script>
</head>

<body>
<?php
session_start();require "../includes/include.php";//error_reporting (E_ALL ^ E_NOTICE); ?> 

<div class="wrapper" style="background-color:yellow;width:650px;height:100%;">
<div class="tmenu" style="background-color:blue;width:400px;height:100;float:left;"><ul><li><a href="../agprofile1.php">Sell</a></li>
</ul></div>
<div class="rmenu" style="background-color:red;width:100px;height:100%;float:left;"></div>
<div class="content" style="background-color:gray;width:450px;height:100%;float:left;">
	 	<form action="<?php echo $_SERVER["PHP_SELF"];?>" name="stock" id="stock" method="get" style="display:;" onsubmit="quote(); return false;">
			<b>Please enter the symbol of the stock.</b>
			<input name="symbol" id="symbol" type="text" />
			<input type="submit" value="submit" />			
		</form>	 
<div id="quote"></div> 

</div>
<div class="lmenu" style="background-color:red;width:100px;height:100%;float:right;"></div>
</div>
</body>
</html>