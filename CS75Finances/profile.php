<?php
	require "templates/begin.php";
	//find out how much cash is left in users tabel
	$funds_sql=mysql_query("SELECT cash FROM users WHERE name= '$_SESSION[userid]'");
	$funds = mysql_fetch_array($funds_sql);
	//form an array with a single instance of symbols in order to find the current values
	$companies = mysql_query("SELECT stock_symbol FROM shares where user_id= '$_SESSION[num_id]' GROUP BY stock_symbol");
	while ($companies_sql = mysql_fetch_array($companies))
		{
			$symbol=$companies_sql[0];
			$handle = fopen("http://download.finance.yahoo.com/d/quotes.csv?s='$companies_sql[0]'&f=l1&e=.csv", "r");
			$price[$symbol] = fgetcsv($handle,1000);
			//print_r($price[$symbol][0]);
		}		
	//select all the fields from shares tablet
	$sql = mysql_query("SELECT * FROM shares WHERE user_id = '$_SESSION[num_id]'");
	if (mysql_num_rows($sql) == 0)
	   {
		echo "No record to show.";
	   }
	else
	   {
?>	
			   <table border="1" bgcolor="lightblue">
			   <tr colspan="5" bgcolor="yellow"><td colspan="5">You have $<?php print($funds["cash"]); ?> left in your account.</td></tr>
			   <th>Stock symbol</th>
			   <th>Share purchase price</th>
			   <th>Share current price</th>
			   <th>Number of shares purchased</th>
			   <th>Number of shares left</th>
			   <th>Total paid for the stock</th>
			   <th>Purchase date and time</th>
			   
<?php		//iterate over all the transaction records
		while ($records=mysql_fetch_array($sql))
			{
?>	
			   <tr>
				<td><?php print(strtoupper($records["stock_symbol"])); ?></td>
				<td><?php print($records["share_price"]); ?></td>
				<td><?php print($price[$records["stock_symbol"]][0])?></td>			
				<td><?php print($records["share_quantity"]); ?></td>
				<td><?php print($records["quantity_left"]); ?></td>
				<td><?php print($records["share_quantity"]*$records["share_price"]); ?></td>
				<td><?php print($records["purchase_time"]); ?></td>
			   </tr>
<?php
			}
	    }
?>
			</table>
			<ul>
				<li><a href="home.php">Home</a></li>
				<li><a href="agprofile.php">Go to profile</a></li>
				<li><a href="show_stock.php">Get a quote/Buy</a></li>
				<li><a href="profile.php">Show history</a></li>
				<li><a href="agprofile.php">Sell</a></li>
			</ul>
<?php
	require "templates/end.php";
?>												

	