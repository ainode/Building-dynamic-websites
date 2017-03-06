<?php
//educational and experimental only.
//creating a new xml doc and
//adding a node to an xml file
$doc = new DOMDocument;

$node = $doc->createElement("para");
$newnode = $doc->appendChild($node);

echo $doc->saveXML();
?> 
