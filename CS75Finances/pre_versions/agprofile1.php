<!DOCTYPE html PUBLIC
     "-//W3C//DTD XHTML 1.0 Transitional//EN"
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


<html xmlns="http://www.w3.org/1999/xhtml">
  
   <head>
    
	<script type="text/javascript" src="includes/jsfuncs.js">
    
	     // <![CDATA[
	    // ]]>

	</script>	

  
<?php
	session_start();
	require "include.php";
	//find out how much cash is left in users tabel and the user' id
	$userinfo_sql=mysql_query("SELECT id, cash FROM users WHERE name= '$_SESSION[userid]'");
	$user_info = mysql_fetch_array($userinfo_sql);
	//form an array with a single instance of symbols in order to find the current values
 
	$companies = mysql_query("SELECT stock_symbol FROM shares where user_id= '$user_info[id]' GROUP BY stock_symbol");
	$grandtotal = 0;
	while ($companies_sql = mysql_fetch_array($companies))
		{
			$symbol=$companies_sql[0];
			$handle = fopen("http://download.finance.yahoo.com/d/quotes.csv?s='$companies_sql[0]'&f=l1&e=.csv", "r");
			$price[$symbol] = fgetcsv($handle,1000);
		}
	
	//select fields to be aggregated for the same stock purchased at different times
	$companies = mysql_query("SELECT id, stock_symbol, SUM(quantity_left), AVG(share_price)  
				  FROM shares WHERE user_id= '$user_info[id]' GROUP BY stock_symbol");
	//select total number of shares and total money paid
	$sum= mysql_query("SELECT share_price, quantity_left FROM shares WHERE user_id = '$user_info[id]' AND quantity_left>0");
	while ($total = mysql_fetch_array($sum))
		{
		   $grandtotal = $grandtotal + $total["share_price"] * $total["quantity_left"];
		}
?>
	<body>
		<table border="1" bgcolor="lightblue">
		<tr colspan="5" bgcolor="yellow"><td colspan="6">You have $<?php print($user_info["cash"]); ?> cash left in your account.</td></tr>
			   <th>Stock symbol</th>
			   <th>Average purchase price</th>
			   <th>Share current price</th>
			   <th>Number of shares available</th>	
			   <th>Total current value</th>
			   
<?php
	//initiate vaiable for total paid for different stock
	$currenttotal=0;
	
		
	//iterate over all the records retrieved from mysql and put them into a table
	while ($records=mysql_fetch_array($companies))
			{
			  if ($records["SUM(quantity_left)"]>0)
			    { 	 
?>	
			   <tr>
				<td><?php print(strtoupper($records["stock_symbol"])); ?></td>				
				<td><?php print($records["AVG(share_price)"]); ?></td>
				<td><?php print($price[$records["stock_symbol"]][0]);?></td>
				<td><?php print($records["SUM(quantity_left)"]); ?></td>
				<td><?php print($price[$records["stock_symbol"]][0]*$records["SUM(quantity_left)"]);?></td>
				<td><button onclick = "showsellfield('<?php print(strtoupper($records["stock_symbol"])); ?>','<?php print($records["SUM(quantity_left)"]);?>');">Sell</button></td>
				<td><button onclick = "showdetail('<?php print($user_info["id"])?>','<?php print($records["stock_symbol"])?>','<?php print($price[$records["stock_symbol"]][0]);?>');">Detail</button></td>
			   </tr>
<?php
		             }
				   //calculate to total of current value of all shares in the profile
				   $currenttotal = $currenttotal + $price[$records["stock_symbol"]][0]*$records["SUM(quantity_left)"];
			}

?>
		</table>	
		<br /><br />
		<table border="1" bgcolor="navyblue" style= "position:top">
			<th>Total paid for different stocks</th>
			<th>Total current value of all different shares</th>
			<th>Total value of your assets including shares and cash</th>
			<tr>
				<td><?php print($grandtotal);?></td>
				<td><?php print($currenttotal);?></td>
				<td><?php print($currenttotal + $user_info["cash"]);?></td>
			</tr>
		</table >
	<div id="detail"></div>
	<div id="selldiv" style="display:none">
		<form name="sellform" action="sell.php" method="post" onsubmit="return validate();">
		   <b>Please enter the number of the shares of <div id="symbl" style="display:inline;color:blue;"></div> that you want to sell</b>
		   <br />You have <b><div id="num" style="display:inline;color:purple;"></div></b> shares available for this stock.
		   <input type="text" name="shrnum" id="shrnum" />
		   <input type="hidden" name="stock_name" id="stock_name" value="" />
		   <input type="hidden" name="user_id" id="user_id" value="<?php print($user_info["id"])?>" />
		   <input type="submit" value="submit" id="sendnum"  /><div id="inval" style="display:none;color:red;"></div>
		</form>
	</div>
		<li><a href="home.php">Home</a></li>
		<li><a href="show_stock.php">Get a quote/Buy</a></li>
		<li><a href="profile.php">Show all transactions</a></li>		
	</body>
</html>

	