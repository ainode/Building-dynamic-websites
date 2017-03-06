<?php session_start();?>
<?php 
  $xml=new SimpleXMLElement(file_get_contents("menu.xml"));
  $items=$xml->xpath("//category");
  require_once("header3.php");
  $category = $_GET["category"]; 
  $items = $xml->xpath("//category[@name='$category']/item ");
  $extras = $xml->xpath("//category[@name='$category']/extras/*");
  $_SESSION["category"]=$category;
   
?>
<script style="text/script">
   function input_validate(qty_input)
	{
            var qty=document.forms["add_form"][qty_input].value
             if (qty > 0 && qty!="" && qty==parseInt(qty,10))
		{
		  return true;
	        }
             else
		{  
		  alert("Please enter a valid quantity!");
		  document.forms["add_form"][qty_input].value="";
		  return false;
		}
	}
</script>
<div class="order">
<table border="1" cellpadding="10">
<th colspan="3" align="left">item(s): <?php print($category); ?> </th>
<form action="add2cart.php" name="add_form" method="get">
<?php $arr=array(); 
//$input_val is the index for the inputs in the form for validation purpose and 
//$input_name is the name of the field that actually is transfered to add2cart.php page
//and can be retrieved through $_GET. 
$input_val=0; $input_name=0; $x=0;?>
<?php foreach($items as $item) { ?>
       <tr>
              <td><?php print($item["name"]);?></td>
		<?php foreach($item->size as $size) { ?>
                  <td><?php print($size["description"]); print(" "); print("$". $size->price);   ?>
			<?php
			   $name=$item["name"];
			   $size=$size["description"];
			   $key=$name .".". $size;
			   $arr[]=$key;
			   	
		         ?>
                           
		  <br /> Quantity: <input type="text" name="<?php print($input_name); ?>" onchange="return input_validate(<?php print($input_val);?>)" maxlength="4" size="4"/>
		  <?php if ($extras)
		   {?><br />Extras:<br /><?php
		     
                     foreach($extras as $extra_item)
		      { 
                        echo $extra_item->getName();
			foreach($extra_item->size as $extra_size)
			  {     $size_des=$extra_size["description"];
			     if ($size_des=="$size")
				{
		                  $input_val++; 
			          print("$". $extra_size->price);
		                ?><input type="checkbox" name="<?php echo $x .".". $extra_item->getName() .".". $key; ?>" />
		 		<?php } 				
		              
			  } 
		        $x++;
			}
                   }
                   ?>				
		  </td>
              <?php $input_val++; $input_name++;}$_SESSION["arr"]=$arr; ?>
	
      </tr>
<?php } ?>
  <tr><td colspan="4" align="right"><input type="submit" value="submit" /></td></tr>
</form>
</table>
</div>
<?php require_once("footer.php");?>