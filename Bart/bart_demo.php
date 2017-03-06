<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>

<?php
	$rts = simplexml_load_file("routes.xml");
?>
<HEAD>

<TITLE> Google Map Test </TITLE>

<META NAME="Generator" CONTENT="EditPlus">

<META NAME="Author" CONTENT="">

<META NAME="Keywords" CONTENT="">

<META NAME="Description" CONTENT="">

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false">
</script>

<script type="text/javascript">

	function initialize()

		{

			 latlng = new google.maps.LatLng(37.73434,-122.294998);
			 opt =
{
				 
center:latlng,
				 
zoom:11,

				 mapTypeId: google.maps.MapTypeId.ROADMAP,
				 
disableAutoPan:false,
				 
navigationControl:true,
				 
navigationControlOptions:
				 	{
						style:google.maps.NavigationControlStyle.SMALL
					},
				 mapTypeControl:true,
				 
mapTypeControlOptions:
					{
						style:google.maps.MapTypeControlStyle.DROPDOWN_MENU
					}
				};

			 map = new google.maps.Map(document.getElementById("map"),opt);
			 marker= new google.maps.Marker({
position: new google.maps.LatLng(37.73434,-122.294998),
title: "Code",
clickable: true,
map: map
});
			 infiwindow = new google.maps.InfoWindow(
{
   content: "I am here!"
});
			


google.maps.event.addListener(marker,'mouseover',function(){
infiwindow.open(map,marker);
});
			
google.maps.event.addListener(marker,'mouseout',function(){
infiwindow.close(map,marker);
});
		


}

	function setroute()
		{
			 var route = document.forms[0].routes.value;
			 var RouteCoordinates = [
				
		         new google.maps.LatLng(38.018914, -121.945154),
        		 new google.maps.LatLng(38.003275, -122.024597),
        		 new google.maps.LatLng(37.973737, -122.029095),
        		 new google.maps.LatLng(37.928403, -122.056013)
				];
    			 var RoutePath = new google.maps.Polyline(
			    {
      			 	path: RouteCoordinates,
      			 	strokeColor: "#FF0000",
      			 	strokeOpacity: 1.0,
      			 	strokeWeight: 2
    			    });
 
   			RoutePath.setMap(map);
		}
	function test(event)

		{
			

alert( event.latLng.lat());
			
alert(event.latLng.lng());
		

}

</script>
	
<style type"text/css">

		#map
		{
			
width:800px;
height:600px;
float:left;
position:absolute;
left:100px;
top:100px;
		

}

</style>

</HEAD>


<BODY onload="initialize();">

	<div id="map" >

</div>

<form>
<select name="Routes" id="routes" onchange="setroute()">
<?php
	foreach ($rts -> routes -> route as $route)
	  {
?>
	    <option value="<?php print($route -> routeID);?>"><?php print($route -> routeID);?></option>
<?php 
	  } 
?>
</select>
</form>

</BODY>

</HTML>
