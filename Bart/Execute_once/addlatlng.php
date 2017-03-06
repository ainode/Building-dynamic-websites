<?php
/*
 *This code is to be executed once to 
 *append extra xml elements and text 
 *nodes from one xml in the address 
 *http://api.bart.gov....... to 
 *another xml file on the local hard
 * drive.
 */
$stns = simplexml_load_file("stn_list.xml");
foreach ( $stns->stations->station as $station)
	{	
		$stn_latlng = simplexml_load_file("http://api.bart.gov/api/stn.aspx?cmd=stninfo&orig=$station->abbr&key=TXDM-IRSN-TSSQ-US4B"); 
		$station -> addchild(gtfs_latitude, $stn_latlng -> stations -> station -> gtfs_latitude);
		$station -> addchild(gtfs_longitude, $stn_latlng -> stations -> station -> gtfs_longitude);
		print_r ($station);
	}
$stns -> saveXml("stn_list.xml");


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