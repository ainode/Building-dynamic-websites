<?php
//add an element and it's text value 
//to an xml file and saving it
$xml = simplexml_load_file("stn_list.xml");
//var_dump($xml);
$xml->stations->station[0]->addChild("date", "2006-10-13");
$xml -> saveXml("stn_list.xml");

//$s = simplexml_import_dom($simp);
//$s->saveXML('test.xml');

//printing the result
foreach ($xml->stations->station->children() as $child)
  {print_r($child);
  echo "Child node: " . $child . "<br />";
  }
?>