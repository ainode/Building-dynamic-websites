<?php 
session_start();
require "includes/include.php";
if (isset($_POST["shrnum"]) && isset($_POST["user_id"]) && isset($_POST["stock_name"]))
	{ 
	//open the file that contains the stock with the symbol recieved from stock.php
	$handle= fopen("http://download.finance.yahoo.com/d/quotes.csv?s=".$_POST["stock_name"]."&f=l1&e=.csv", "r");
	if (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
	   {
		$total_val = $data[0]*$_POST["shrnum"];	  //print_r($total_val);
		//insert the number of the stocks sold with the name and price into the sell table		
		$share_sql = mysql_query("SELECT id, quantity_left FROM shares WHERE user_id = '$_POST[user_id]' AND stock_symbol = '$_POST[stock_name]' ORDER by id ");
			$sell_num = $_POST["shrnum"];
			//iterate over records of the purchases of shares in the order of their purchase (earlier purchases first).
			while ($share = mysql_fetch_array($share_sql))
			    {
			      //see if the number of shares to be sold is higher than the batch that
			      //was purchased earlier	
			      if ($sell_num>0 && $share["quantity_left"])
				{
				if ($share["quantity_left"] >= $sell_num)
					{
					   mysql_query("SET AUTOCOMMIT=0");
					   mysql_query("START TRANSACTION");	
						$sql1=mysql_query("UPDATE shares SET quantity_left = quantity_left-'$sell_num' WHERE id = '$share[id]' ");
						$sql2=mysql_query("INSERT INTO sell (share_id, sell_price,share_quantity)
	  						VALUES
	  					('$share[id]', '$data[0]' , '$sell_num')");
						if ($sql1 and $sql2)
							{
							   $sell_num = 0;
							   mysql_query("COMMIT");
							   ?><script type="text/javascript">document.getElementById("sellnote").innerHTML="Transaction completed.";document.write("hello")</script><?php

							}
						else
							{
							   mysql_query("ROLLBACK");
							   ?><script type="text/javascript">document.getElementById("sellnote").innerHTML="Transaction not completed.";</script><?php
							}						

					}
				else
						//if the number is higher, than the first batch of shares purchased earlier,
						//set the number of shares left on that record to '0' , deduct that number 
						//from the sell number and go to the next record.
					{
						mysql_query ("SET AUTOCOMMIT=0");
						mysql_query ("START TRANSACTION");
						$sql1 = mysql_query("INSERT INTO sell (share_id, sell_price,share_quantity)
	  						VALUES
	  					('$share[id]', '$data[0]' , '$share[quantity_left]')");
						$sql2 = mysql_query("UPDATE shares SET quantity_left = '0' WHERE id = '$share[id]'");
						if ($sql1 and $sql2)
							{
							   mysql_query("COMMIT");
							   $sell_num = $sell_num - $share["quantity_left"];	
							}
						else
							{
							   mysql_query("ROLLBACK");
						        }
					}	
				}
			     }	
	    
				//update the amount of cash left
			if ($sql1 and $sql2)
				{
	  			$sqlr = mysql_query("UPDATE users SET cash = cash+$total_val WHERE name = '$_SESSION[userid]'");
				}
?>         
		<p style=color:"red";>Transaction completed.</p>		
<?php
		   $_SESSION['complete'] = TRUE;
		   header("Location:home.php");
	}
	}
	else
	   {
?>         
		<p style=color:"red";>Transaction not completed.</p>		
<?php
		header("Location:agprofile.php");
	   }
?>