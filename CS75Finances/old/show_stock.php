<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


<html xmlns="http://www.w3.org/1999/xhtml">

   <head>
      <script type="text/javascript">
  //<![CDATA[
          function validate()
		{
			if (document.forms.stock.symbol.value=="" || !document.forms.stock.symbol.value.match(/[a-zA-Z]/))
				{
					document.getElementById('symbol').value="";
					document.forms.stock.symbol.focus();
					alert("Please enter a valid symbol.")
					return false;
				}
		}
		function validatenum()
		   {
			var snum = document.getElementById("stocknum").value;
			if(!document.forms.purchase.stocknum.value.match(/[0-9]/) || snum != parseInt(snum,10) || snum < 1 ) 
			   {	
				document.getElementById("stocknum").value="";
				document.getElementById("stocknum").focus();
				alert("Please enter a valid number.")
				return false;
			   }
		   }

  //]]>	
      </script>
   </head>
<?php
	if (isset($_POST["symbol"]))
	{ 
	//open the file that contains the stock with the symbol recieved from stock.php
	$handle= fopen("http://download.finance.yahoo.com/d/quotes.csv?s=".$_POST["symbol"]."&f=sl1d1t1c1ohgv&e=.csv", "r");
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
			if ($_POST["symbol"]!="" && $price[1]== "0.00" && $price[8]== "N/A")
			  {
?>				
				<b>No information available on this stock. Please enter another symbol.</b> 
<?php
				$notsymbol = true;
			  }
			else
			  {
?>
			     <body onLoad="document.forms.purchase.stocknum.focus();">
				<b>Please enter the number of the shares you would like to buy.</b>
				<form action="purchase.php" name="purchase" method="post" onsubmit = "return validatenum();">
					<input name="stockname" type="hidden" value="<?php echo $_POST['symbol'];?>"/>
					<input name="stockprice" type="hidden" value="<?php echo $price[1];?>">
					<input name="stocknum" id= "stocknum" type="text" />
					<input type="submit" value="Buy" />	
				</form>	
			     </body>		 
<?php
			  }
	}		
		if(!isset($_POST["symbol"]) || $notsymbol)
		{
?>	
	  	<body OnLoad="document.forms.stock.symbol.focus();">	
	 	<form action="<?php echo $_SERVER["PHP_SELF"];?>" name="stock" id="stock" method="post" onsubmit="return validate();">
			<b>Please enter the symbol of the stock.</b>
			<input name="symbol" id="symbol" type="text" /><br />
			<input type="submit" value="submit" />			
		</form>	  
	   	<li><a href="home.php">Home</a></li>
		<li><a href="agprofile.php">Show my profile/Sell</a></li>
		<li><a href="profile.php">Show all transactions</a></li>
	</body>
<?php
		}
?>
</html>
	