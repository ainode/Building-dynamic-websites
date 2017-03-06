<?php 
  session_start();
  $category=$_SESSION["category"];
  $xml=new SimpleXMLElement(file_get_contents("menu.xml"));
  $items = $xml->xpath("//category[@name='$category']/item");
  $extras = $xml->xpath("//category[@name='$category']/extras/*");
  $pizzas=($_SESSION["arr"]);
  $items_qty=$_GET;
  $items_keys=array_keys($_GET);
     foreach ($items_keys as $key => $item_key)
	{
	 //print_r($item_key);
	 if ($items_qty[$item_key]>0)
	   {
	     $kee=$key+1;
	     $qty=$items_qty[$item_key];
	     $pizza=$pizzas[$item_key];
		if ($items_qty[$items_keys[$kee]]=="on")
		 {
		   while ($items_qty[$items_keys[$kee]]=="on")
		    {
		      $array=explode("_",$items_keys[$kee]);
		      $pizza=$pizza .".". $array[1];
		      $kee++;
		    }
		  }
		
	      $_SESSION["cart"][$pizza]=$_SESSION["cart"][$pizza]+$qty;
		   
	   }
	  
             
        }
header("Location:cart.php");
?>