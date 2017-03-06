function hide_spans()
	{
		document.getElementById("span1").style.display="none";
		document.getElementById("span2").style.display="none";
		document.getElementById("span4").style.display="none";
	}	
function validate_login()
	{      
		hide_spans();
		 //check if the fields have been filled
		input_set=true; 
		if (document.forms.login.user.value=="")
			{
				document.forms.login.user.focus();
				//show the error (it will be a red astrix in front of the empty field!)		
				document.getElementById("span1").style.display="block";
				input_set=false;
			}
		else if	(!document.forms.login.user.value.match(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/))   
			{
				document.forms.login.user.focus();
				//replace the red astrix with the following error message in red!!!
				document.getElementById("span1").innerHTML="Please enter a valid email address.";
				document.getElementById("user").value = "";
				document.getElementById("user").focus();
				document.getElementById("span1").style.display="block";
				input_set=false;		 
 			} 
		else    document.getElementById("span1").style.display="none";
		if (document.forms.login.pass.value=="")
			{
				document.getElementById("span2").style.display="block";
				if (input_set)
					{
					   document.forms.login.pass.focus()
					   input_set=false;
					}
			}
		
		else if (!document.forms.login.pass.value.match(/[A-Za-z]/) || !document.forms.login.pass.value.match(/[0-9]/) || document.forms.login.pass.value.match(/\W/) || document.forms.login.pass.value.length<6)
				{
					document.getElementById("span2").innerHTML="Password cannot be entirely numeric or entirely alphabetical and at least 6 characters.";
					document.getElementById("span2").style.display="block";
					document.getElementById("pass").value = "";
					document.login.pass.focus();
					input_set=false;
				}
		else    document.getElementById("span2").style.display="none";
		if (!input_set)
			{
				document.getElementById("span4").style.display="block";
				return false;
			}
	}

function validate_reg()
	{       //check if the fields have been filled
		input_set=true; 
		if (document.registration.email.value=="")
			{
				document.registration.email.focus();
				//show the error (it will be a red astrix in front of the empty field!)		
				document.getElementById("span1").style.display="block";
				input_set=false;
			}
		else if	(!document.forms.registration.email.value.match(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/))   
			{
				document.registration.email.focus();
				//replace the red astrix with the following error message in red!!!
				document.getElementById("span1").innerHTML="Please enter a valid email address.";
				document.getElementById("span1").style.display="block";
				input_set=false;		 
 			} 
		else    document.getElementById("span1").style.display="none";
		if (document.registration.pass1.value=="")
			{
				document.getElementById("span2").style.display="block";
				if (input_set)
					{
					   document.registration.pass1.focus()
					   input_set=false;
					}
			}
		
		else if (!document.forms.registration.pass1.value.match(/[A-Za-z]/) || !document.forms.registration.pass1.value.match(/[0-9]/) || document.forms.registration.pass1.value.match(/\W/) || document.forms.registration.pass1.value.length<6)
				{
					document.getElementById("span2").innerHTML="Password cannot be entirely numeric or entirely alphabetical and at least 6 characters.";
					document.getElementById("span2").style.display="block";
					document.registration.pass1.focus();
					input_set=false;
				}
		else    document.getElementById("span2").style.display="none";
		if (document.registration.pass2.value=="")
			{
				document.getElementById("span3").style.display="block";
				if (input_set)
					{
					   document.registration.pass2.focus();
					   input_set=false;
					}	
			}
		//make sure the value of the two passwords are the same and if not give error message.
		else if (document.registration.pass2.value!=document.registration.pass1.value)
			{
				document.getElementById("span3").innerHTML="Second password should match the first."
				document.registration.pass2.focus();
				input_set=false;
			}
		else	document.getElementById("span3").style.display="none";
		if (!input_set)
			{
				document.getElementById("span4").style.display="block";
				return false;
			}
		
	}
		//on click of the sell button show detail field and show 
		//in the text above, the number of the shares left and the
		//the name of the stock.  
		function showsellfield(smbl,avail_share)
		   {
			document.getElementById("inval").innerHTML = "";
			document.getElementById("detail").style.display = "none";
			avail = avail_share;
			document.getElementById("selldiv").style.display = "block";
			document.getElementById("symbl").innerHTML = smbl;
			document.getElementById("num").innerHTML = avail_share;
			document.getElementById("shrnum").focus();
			//assign value to input tag in form to be posted to sell.php as stock name to be sold
			document.getElementById("stock_name").value = smbl;
		   }
		//validate the number of the stock to be sold entered by the user.
		function validate()
		   {
			var snum = document.getElementById("shrnum").value;
			if(!document.forms.sellform.shrnum.value.match(/[0-9]/) || snum != parseInt(snum,10) || snum < 1 ) 
			   {	
				document.getElementById("inval").style.display="inline";
				document.getElementById("inval").innerHTML = "Please enter a valid number";				
				document.getElementById("shrnum").value="";
				document.getElementById("shrnum").focus();
				return false;
			   }
			else if ( avail < parseInt(snum,10) )
				  {
					document.getElementById("inval").style.display="inline";
					document.getElementById("inval").innerHTML="Quantity entered exceeds the number of shares available";			
				  	document.getElementById("shrnum").value="";
					document.getElementById("shrnum").focus();
					return false;
				  }
			   
		   } 
		//show details of the past transactions
		//related to the purchase of the stock owned. 

		function showdetail(id,symbol,current)
		   {
			document.getElementById("inval").innerHTML = "";
			document.getElementById("detail").style.display = "block";

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
            
			var url = "detail.php?symbol=" + symbol + "& id=" + id + "& current=" + current;

            
			// get quote
            
			xhr.onreadystatechange = handler1;
            
			xhr.open("GET", url, true);
            
			xhr.send(null);
        
		   }


        
/*
         * void
         * handler()
         *
         * Handles the Ajax response.
         */
        
		function handler1()
        
		   {
            
			// only handle requests in "loaded" state
            
			if (xhr.readyState == 4)
            
			   {
                
				if (xhr.status == 200)
                
			  	    {                    
                   			document.getElementById("detail").innerHTML = xhr.responseText;
					
				    }
  
				              
                		else
                    alert("Error with Ajax call!");
            
			   }
        
		   }

	
		function quote()
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
            
			var url = "quote.php?symbol=" + document.getElementById("symbol").value ;

            
			// get quote
            
			xhr.onreadystatechange = handler2;
            
			xhr.open("GET", url, true);
            
			xhr.send(null);
        
		   }


        
/*
         * void
         * handler()
         *
         * Handles the Ajax response.
         */
        
		function handler2()
        
		   {
            
			// only handle requests in "loaded" state
            
			if (xhr.readyState == 4)
            
			   {
                
				if (xhr.status == 200)
                
			  	    {                    
                   			document.getElementById("quote").innerHTML = xhr.responseText;
					document.getElementById("stock").style.display = "none";
				    }
  
				              
                		else
                    alert("Error with Ajax call!");
            
			   }
        
		   }


	       function validation()
		{	quote();
			if (document.forms.stock.symbol.value=="" || !document.forms.stock.symbol.value.match(/[a-zA-Z]/))
				{
					document.getElementById('symbol').value="";
					document.forms.stock.symbol.focus();
					alert("Please enter a valid symbol.")
					return false;
				}
			else quote();
		}

          function show_quote_form()
		{
			document.forms.stock.style.display="block";
			document.getElementById("quote").innerHTML = "";
			document.getElementById("symbol").value = "";
			document.getElementById("symbol").focus();
			document.getElementById("logdiv").style.display = "none";
			document.getElementById("login").style.display = "none";
		}
	  function show_login_form()
		{
			hide_spans();
			document.forms.login.style.display="block";
			//document.getElementById("logdiv").style.display = "block";
			document.getElementById("quote").innerHTML = "";
			document.getElementById("user").value = "";
			document.getElementById("pass").value = "";
			document.getElementById("stock").style.display = "none";
			document.getElementById("user").focus();
		}
		function showdetail(id,symbol,current)
		   {
			document.getElementById("inval").innerHTML = "";
			document.getElementById("detail").style.display = "block";

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
            
			var url = "detail.php?symbol=" + symbol + "& id=" + id + "& current=" + current;

            
			// get quote
            
			xhr.onreadystatechange = handler1;
            
			xhr.open("GET", url, true);
            
			xhr.send(null);
        
		   }


        
/*
         * void
         * handler()
         *
         * Handles the Ajax response.
         */
        
		function handler1()
        
		   {
            
			// only handle requests in "loaded" state
            
			if (xhr.readyState == 4)
            
			   {
                
				if (xhr.status == 200)
                
			  	    {                    
                   			document.getElementById("detail").innerHTML = xhr.responseText;
					
				    }
  
				              
                		else
                    alert("Error with Ajax call!");
            
			   }
        
		   }

	
