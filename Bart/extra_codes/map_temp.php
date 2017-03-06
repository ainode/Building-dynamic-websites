/*
 // update low
 var gtfs_latitude = routexml.getElementsByTagName("gtfs_latitude");
 var gtfs_longitude = routexml.getElementsByTagName("gtfs_longitude");
 var x=0;
 var gtfs=gtfs_latitude.length;
 var flightpathcoordinate=[
 for (x=0; x<gtfs; x++)
 {
 new google.maps.LatLng(gtf_latitude[x].firstchild.nodevlue, gtf_longitude[x].firstchild.nodevlue);
 }
 ];
 var flightPath = new google.maps.Polyline({
     path: flightPlanCoordinates,
     strokeColor: "#FF0000",
     strokeOpacity: 1.0,
     strokeWeight: 2
   });

  flightPath.setMap(map);
 }
 
*/



function quote()
 {
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
 var url = "route.php?symbol=" + document.getElementById("symbol").value;

 // get quote
 xhr.onreadystatechange = handler;
 xhr.open("GET", url, true);
 xhr.send(null);
 }


 /*
 * void
 * handler()
 *
 * Handles the Ajax response.
 */
 /*
 function handler()
 {
 // only handle requests in "loaded" state
 if (xhr.readyState == 4)
 {
 if (xhr.status == 200)
 {
 // get XML
 var xml = xhr.responseXML;

 // update low
 var gtfs_latitude = xml.getElementsByTagName("gtfs_latitude");
 var gtfs_longitude = xml.getElementsByTagName("gtfs_longitude");
 var x=0;
 var gtfs=gtfs_latitude.length;
 var flightpathcoordinate=[
 for (x=0; x=<gtfs; x++;)
 {
 new google.maps.LatLng(gtf_latitude[x].firstchild.nodevlue, gtf_longitude[x].firstchild.nodevlue),
 }
 ];
 var flightPath = new google.maps.Polyline({
     path: flightPlanCoordinates,
     strokeColor: "#FF0000",
     strokeOpacity: 1.0,
     strokeWeight: 2
   });



  flightPath.setMap(map);
 }
 }
 else
 alert("Error with Ajax call!");
 }
 }
*/


/*		function setpath(routes)
		   {
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
            
			var url = "route.php?path=ROUTE 1" ;

            
			// get quote
            
			xhr.onreadystatechange = handler;
            
			xhr.open("GET", url, true);
            
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
                
			  	    {   //document.getElementById("test").innerHTML=xhr.responseText;
                 
				        var flightPlanCoordinates = xhr.responseText;
					var flightPath = new google.maps.Polyline({
					path: flightPlanCoordinates,
					strokeColor: "#FF0000",
					strokeOpacity: 1.0,
					strokeWeight: 2
				    });

					//flightPath.setMap(map);
  			   	    }
		           }
  				              
                		//else
                    
					//alert("Error with Ajax call!");
            
			   }
        
		   
*/


/*  function setpath() { 
 *  var flightPlanCoordinates = [
 *		         new google.maps.LatLng(38.018914, -121.945154),
 *       		 new google.maps.LatLng(38.003275, -122.024597),
 *       		 new google.maps.LatLng(37.973737, -122.029095),
 *       		 new google.maps.LatLng(37.928403, -122.056013)
 *   ];
 *   var flightPath = new google.maps.Polyline({
 *     path: flightPlanCoordinates,
 *     strokeColor: "#FF0000",
 *     strokeOpacity: 1.0,
 *     strokeWeight: 2
 *   });
 *
 *  flightPath.setMap(map);
 * }
 */ 

