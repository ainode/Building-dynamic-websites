<?php
	require "includes/include.php";
	session_start();
?>
<!DOCTYPE html PUBLIC
     "-//W3C//DTD XHTML 1.0 Transitional//EN"
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


<html xmlns="http://www.w3.org/1999/xhtml">
  				
	<body>
	<table border="1">
	  <th>Share purchase price</th>
	  <th>Purchase time/date</th>
	  <th>Purchase quantity</th>
	  <th>Total paid</th>
<?php
	$total_quantity = 0;
	$total = 0;
	$sql = mysql_query("SELECT * FROM  shares WHERE stock_symbol = '$_GET[symbol]' AND user_id = '$_GET[id]' AND quantity_left>'0'");
	while ( $detail = mysql_fetch_array($sql))
		{
?>
			<tr>
			 <td><?php print($detail["share_price"]);?></td>
			 <td><?php print($detail["purchase_time"]);?></td>
			 <td><?php print($detail["share_quantity"]);?></td>
			 <td><?php print($detail["share_price"]*$detail["share_quantity"]);?></td>
			</tr> 
<?php
			$total_quantity = $total_quantity + $detail["share_quantity"];
			$total = $total + $detail["share_price"]*$detail["share_quantity"];
		}
			$average = $total/$total_quantity;
?>			
			<tr><td colspan = "4"><b>Average purchase price:<div style="color:red" id="avg"><?php print($average);?></div></b></td></tr>
	<script type="text/javascript"> 			
			if (Number(<?php print($average);?>) > Number(<?php print($_GET["current"]);?>))
				{
					
					document.getElementById("avg").style.color = "red"; 
				}
			else

					document.getElementById("avg").style.color = "blue"; 
	</script>			

	</body>
</html>