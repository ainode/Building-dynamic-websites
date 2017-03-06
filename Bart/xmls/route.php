<?php
header("Content-type: text/plain");
//  $routexml = simplexml_load_file($_GET["routes"].".xml")  
  $routexml = simplexml_load_file("ROUTE 1.xml");  
  //echo "<p>hello</p>"; 
/* print("[");
  foreach ($routexml -> routes -> route -> config->station as $station )
	{
	  print("new google.maps.latLng(".$station->gtfs_latitude.", ".$station->gtfs_longitude."),");
	  print("<br />");
	}	
 
  print("];");*/
print("[
 		         new google.maps.LatLng(38.018914, -121.945154),
        		 new google.maps.LatLng(38.003275, -122.024597),
        		 new google.maps.LatLng(37.973737, -122.029095),
        		 new google.maps.LatLng(37.928403, -122.056013)
    ];");
?>