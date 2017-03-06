<?php
/*
 *This code is to be executed once to 
 *append extra xml elements and text 
 *nodes from one xml in the address 
 *http://api.bart.gov....... to 
 *another xml file on the local hard
 * drive.
 *
 *
 *in this case unlike addlatlng.php we are
 *adding nodes indicating latitude and 
 *longitude, from a local file(stn_list.xml)
 *to an instance of a file on the internet
 *and saving it as a new file with the name route12.xml on
 *the local hard. we can change the name of the local file
 *and the name of the file to be copied and create different
 *files here.
 *
 */
$stn_latlng = new SimpleXMLElement(file_get_contents("../stn_list.xml"));
//$stns = simplexml_load_file("../route1.xml");
$stns = simplexml_load_file("http://api.bart.gov/api/route.aspx?cmd=routeinfo&route=8&key=TXDM-IRSN-TSSQ-US4B");
foreach ( $stns->routes->route->config->station as $station)
	{	
		$lat=$stn_latlng ->xpath ("//stations/station[abbr = '$station']/gtfs_latitude");
		$long=$stn_latlng ->xpath ("//stations/station[abbr = '$station']/gtfs_longitude");		
		//print_r($station->gtfs_firstChild);
		//$xs=$stn_latlng ->xpath ("/stations/station[abbr = '$station->gtfs_latitude']");
		$station -> addchild(gtfs_latitude, $lat[0]);
		$station -> addchild(gtfs_longitude, $long[0]);

		//$station -> addchild(gtfs_latitude, $stn_latlng ->xpath ("/stations/station[abbr = '$station->firstChild']/ gtfs_latitude"));
		//$station -> addchild(gtfs_longitude, $stn_latlng ->xpath ("/stations/station[abbr = '$station->firstChild']/gtfs_longitude"));
		//print ($station);
	}
$stns -> saveXml("../route8.xml");
//$stns -> saveXml("c:/Users/User/Documents/route11.xml");


/*
 *Codes below are for info only
 *
 *
*/
//$xml->stations->station[0]->addChild("date", "2006-10-13");
//$xml -> saveXml("stn_list.xml");

//$s = simplexml_import_dom($simp);
//$s->saveXML('test.xml');


//foreach ($xml->stations->station->children() as $child)
//  {
//  echo "Child node: " . $child . "<br />";
//  }

?>