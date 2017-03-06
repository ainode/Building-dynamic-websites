<?php
//  $routexml = simplexml_load_file($_GET["route"].".xml")  
//  new google.maps.LatLng(38.018914, -121.945154),
  $routexml = simplexml_load_file("/xmls/route1.xml");  
  print("[");
  foreach ($routexml -> routes -> route -> config->station as $station )
	{
	  print("new google.maps.latLng(".$station->gtfs_latitude.", ".$station->gtfs_longitude."),");
	}	
  print("];");
?>