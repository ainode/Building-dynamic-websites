<?php
	$xml = new SimpleXMLElement(file_get_contents("menu.xml"));
        $items=$xml->xpath("//category"); 
	require_once("header3.php");
	require_once("footer.php");
?>
