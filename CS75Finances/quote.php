<?php
	if (isset($_GET["symbol"]))
	{ 
	//open the file that contains the stock with the symbol recieved from stock.php
	$handle= fopen("http://download.finance.yahoo.com/d/quotes.csv?s=".$_GET["symbol"]."&f=sl1d1t1c1ohgv&e=.csv", "r");
?>	
  
	   <table border=1>
	      <tr><td>Symbol</td><td>Last trade price</td><td>Last trade date</td><td>Last trade time</td><td>Change</td><td>Open</td><td>Day's high</td><td>Day's low</td><td>Volume</td></tr>
	      <tr>
<?php		
		//define price variable so that you can assign it a value inside the while loop
		$price=0;	
		//iterate over the files and get different stock data from the array formed by fgetcsv()
		while (($data = fgetcsv($handle,1000, ",")) !==FALSE)
		{
			$price=$data;
			$c=0;
			while ($c < count($data))
			  {
?>   
				<td><?php echo "$data[$c]"; ?></td>
<?php		   
		 		$c++;
			  }
?>
	      </tr>
	   </table>
<?php
		}
			//see if the stock related to the symbol entered exists. 
			$notsymbol = false;
			if ($_GET["symbol"]!="" && $price[1]== "0.00" && $price[8]== "N/A")
			  {
?>				
				<b>No information available on this stock. Please enter another symbol.</b> 
<?php
				$notsymbol = true;
			  }
	}
?>