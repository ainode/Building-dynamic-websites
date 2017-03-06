<?php
	$rts = simplexml_load_file("../routes.xml");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

	<html xmlns="http://www.w3.org/1999/xhtml">
				
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<title>Google Maps JavaScript API v3 Example: Polyline Simple</title>
<link href="http://code.google.com/apis/maps/documentation/javascript/examples/default.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript"> 
  
  function initialize() {
     myLatLng = new google.maps.LatLng(37.73434,-122.294998);
     myOptions = {
      zoom: 10,
      center: myLatLng,
      mapTypeId: google.maps.MapTypeId.TERRAIN
    };

     map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
  } 

function marker_window(marker,number)
	{alert(message_array[number]);
    infowindow = new google.maps.InfoWindow(
       { content: message_array[number],
         size: new google.maps.Size(100,50)
       });
        google.maps.event.addListener(marker, 'click', function()
 {
	     infowindow.open(map,marker);
   });

	}


var mlocation = null;
var marker = null;
var markersarray = new Array();
var bartPath = null;
var message_array = new Array();



var xhrm = null;

        

               
        
function show_window(abbr)
        
{
   // alert(marker);       
// instantiate XMLHttpRequest object
            
try
            
{
                
xhrm = new XMLHttpRequest();
            
}
            catch (e)
            
{
                
xhrm = new ActiveXObject("Microsoft.XMLHTTP");
            
}

            
// handle old browsers
            
if (xhrm == null)
            
{
                
alert("Ajax not supported by your browser!");
                
return;
            
}

            
// construct URL
            
var url = "http://api.bart.gov/api/etd.aspx?cmd=etd&orig=" + abbr + "&key=TXDM-IRSN-TSSQ-US4B";

            
//var url = "edt.xml";

            
//var url = xmlname + ".xml"

            
// get quote
            
xhrm.onreadystatechange = infohandler;
            
xhrm.open("GET", url, true);
            
xhrm.send(null);alert("hi");
        
}


        
/*
         * void
         * handler()
         *
         * Handles the Ajax response.
         */
        

function infohandler()
        
{
          // only handle requests in "loaded" state
            
if (xhrm.readyState == 4)
            
{
                
if (xhrm.status == 200)
                
{
                    // get XML
                    
var stnxml=xhrm.responseXML;
var time = stnxml.getElementsByTagName("minutes");
var dest = stnxml.getElementsByTagName("destination");
var destination = dest[0].childNodes[0].nodeValue;
var plat = stnxml.getElementsByTagName("platform");
var dir = stnxml.getElementsByTagName("direction");
var stn_name = stnxml.getElementsByTagName("name");
var name = stn_name[0].childNodes[0].nodeValue;
var dest_num = dest.length;
var message = "";
//for (x=0; x<= dest_num; x++)
	//{
	  message = message + "Next train departs at"+ String(time[0].childNodes[0].nodeValue) + " Destination:" + String(destination) + "Platform:" + String(plat[0].childNodes[0].nodeValue) + "Direction:" + String(dir[0].childNodes[0].nodeValue);
      //message = message + "Next train departs at"+ time[x].childNodes[0].nodeValue; + "Platform:" + plat[x].childNodes[0].nodeValue; + "Direction:" + dir[x].childNodes[0].nodeValue;
	//}

message_array.push(message);

}

} 

}


function clearoverlays() {   if (markersarray) {     for (i in markersarray) {       markersarray[i].setMap(null);     }}if (bartPath) {bartPath.setMap(null); }} 



var xhr = null;

        
/*
         
* void
         
* quote()
         
*
         
* Gets a quote.
         
*/
        
function showpath(xmlname)
        
{
    //alert("hi");       
clearoverlays();

// instantiate XMLHttpRequest object
            
try
            
{
                
xhr = new XMLHttpRequest();
            
}
            catch (e)
            
{
                
xhr = new ActiveXObject("Microsoft.XMLHTTP");
            
}

            
// handle old browsers
            
if (xhr == null)
            
{
                
alert("Ajax not supported by your browser!");
                
return;
            
}

            
// construct URL
            
//var url = "test.php?symbol=" + document.getElementById("symbol").value;

            
//var url = xmlname + ".xml"

            
// get quote
            
xhr.onreadystatechange = handler;
            
xhr.open("GET", xmlname, true);
            
xhr.send(null);
        
}


        
/*
         * void
         * handler()
         *
         * Handles the Ajax response.
         */
        
function handler()
        
{
            // only handle requests in "loaded" state
            
if (xhr.readyState == 4)
            
{
                
if (xhr.status == 200)
                
{
                    // get XML
                    

routexml=xhr.responseXML;
//alert("hi");
 var color = routexml.getElementsByTagName("color");
 color = color[0].childNodes[0].nodeValue;
 var gtfs_latitudes = routexml.getElementsByTagName("gtfs_latitude");
 var gtfs_longitudes = routexml.getElementsByTagName("gtfs_longitude");
 var stn_abbr = routexml.getElementsByTagName("station");
 var x=0;
 var gtfs=gtfs_latitudes.length;
 var routecoordinates = new Array();
 var stn = [];
 for (x=0; x<gtfs; x++)
 { 
     routecoordinates.push(new google.maps.LatLng(parseFloat(gtfs_latitudes[x].childNodes[0].nodeValue), parseFloat(gtfs_longitudes[x].childNodes[0].nodeValue)));
     mlocation = new google.maps.LatLng(parseFloat(gtfs_latitudes[x].childNodes[0].nodeValue), parseFloat(gtfs_longitudes[x].childNodes[0].nodeValue));
     marker = new google.maps.Marker ({
	position : mlocation,
	map : map
	});	
     markersarray.push(marker);
     stnt = (stn_abbr[x].childNodes[0].nodeValue);
     marker.setTitle(stnt);
     stn.push(stnt);
     stnc = stn[x];
     markerc = markersarray[x];
     show_window(stnc);//alert(message_array[x]);
     marker_window(marker,x);
 }


  //alert(message_array);



 bartPath = new google.maps.Polyline({
     path : routecoordinates,
     strokeColor: color,
     strokeOpacity: 1.0,
     strokeWeight: 2
   });
 bartPath.setMap(map);
 }
 } 
 }

</script>
</head>
<body onload="initialize()">
  <div id="map_canvas"></div>

<!--<select name="Routes" id="routes" >-->
<?php
	foreach ($rts -> routes -> route as $route)
	  {
?>
	    <!--<option value="<?php print($route -> routeID);?>" onclick="setpath('<?php print($route -> routeID);?>')"><?php print($route -> routeID);?></option>-->
	    <!--<option name="<?php print($route -> routeID);?>" onclick="showpath('<?php print($route->routeID.'.xml');?>')"><?php print($route -> routeID);?></option>-->
	    <button type="button" name="<?php print($route -> routeID);?>" onclick="showpath('<?php print($route->routeID.'.xml');?>')"><?php print($route -> routeID);?></button>	    
<?php 
	  } 
?>
<!--</select>-->
<!--<button id="selection value="route1.xml"onclick="setpath()">path</button>-->
<div id = "test"></div>
</body>
</html>
