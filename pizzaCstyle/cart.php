<?php
	
        $xml = new SimpleXMLElement(file_get_contents("menu.xml"));


	$items=$xml->xpath("//category");
	session_start();
	
	
        $cart = $_SESSION["cart"];

?>

<?php 
	require_once("header3.php"); 
?>

		
	<div class="order">
	<table border="1" cellpadding="10">
		
<?php 	
			
	if($cart)
			
     {
		
?>
	<style type="text/css">input.hidden{visibility:hidden}</style>			
	<script type="text/javascript">
        input_arr=new Array(); 
	
	function make_arr(input)
	 {
           input_arr.push(input); 
	 }
	function conjurefield(a,b,d)
        {
          document.getElementById(a).style.visibility="visible";
	  document.getElementById(b).style.visibility="hidden";
	  document.getElementById(d).style.visibility="visible";
	  
        }
       function input_validate(count)
        { 
          
	  for(input_count=0;input_count<=count;input_count++)
	   { var input_name=input_arr[input_count];
	     var x=document.forms["edit_form"][input_name].value
             if (x > 0 && x!="" && x==parseInt(x,10))
		{
		  return true;
	        }
             else
		{  
		  alert("Please enter a valid number");
		  document.forms["edit_form"][input_name].value="";
		  return false;
		}
	   } 
	  
         }
		     
        </script>
	<th>Item</th>
	<th>Size</th>
	<th>Quantity</th>
	<th>Extras</th>
	<th>Unit Price</th>
	<th>Item Subtotal</th>

	<th>Remove</th>

	<th>Edit/Update</th>

	<form name="edit_form" action="edit.php" method="get">		
<?php
	
	$input_arr="";			
	$keys = array_keys($cart);
	$total=0;
				
	foreach($keys as $key) 
				
     { 
					
	$array = explode(".", $key);
					
	$name = $array[0];
					
	$size = $array[1];
					
	$quantity = $cart["$key"];

	$price = $xml->xpath("//item[@name='$name']/size[@description='$size']/price");

        $unitPrice = (float) $price[0];
	$extras = "";
	if (count($array)>2)
	  {
            foreach($array as $extra_key => $extra) 
              {
		if ($extra_key > 1 )
	         { 
		 $extra_price = $xml->xpath("//extras/$extra/size[@description='$size']/price");
		 $unitPrice = $unitPrice + (float) $extra_price[0];
                 if ($extras=="")
	 	  {$extras=$extra;}
		 else
		  {$extras = $extras . " and " . $extra;}  
	         } 
	      }	   				
					
	
   }
	else $extras = "None"; 					
	
	$itemSubtotal = $unitPrice * $quantity;
					
					
	$total = $total + $itemSubtotal;
		
?>
					
	<tr>
						
	<td><?php print($name); ?></td>
						
	<td><?php print($size); ?></td>
						
	<td id="<?php print($key ."x")?>" align="right" >
	   <input type="text" class="hidden" size="4" id="<?php print($key);?>" name="<?php print($key)?>" onchange="make_arr('<?php print($key)?>')" value="<?php print($quantity);?>" />
	   <?php print($quantity); ?>
	</td>

	<td><?php print($extras);?></td>
	<td align="right">$<?php printf("%0.2f", $unitPrice); ?></td>
						
	<td align="right">$<?php printf("%0.2f", $itemSubtotal); ?></td>

	<td ><a href="remove.php?name=<?php echo $key ?>"> remove</a></td>
	<td >  
	  <button id="b1" onclick="conjurefield('<?php print($key);?>','<?php print($key."x")?>','s1')" type="button" value="edit">Edit</button> 
	</td>
	  				
	</tr>
		
<?php 	
	}
		
?>
				
	<tr><td colspan="6" align="right"><b>Total: $<?php printf("%0.2f", $total); ?></b></td>
	    <td colspan="2" align="right"><input type="submit" class="hidden" id="s1" onclick="return input_validate('<?php print(count($keys));?>')" value="Update"/></td>
	</tr>

<?php
			
	}
			
else
			
	{
		
?>
				
	Your cart is empty!
		
<?php  }  ?>
		
	</form>
	</table>
		
		 
	<p><a href="checkout.php?total=<?php print($total);?>">Checkout</a></p>

	</div>		

<?php 	require_once("footer.php"); ?>
