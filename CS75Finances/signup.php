<!DOCTYPE html PUBLIC
     "-//W3C//DTD XHTML 1.0 Transitional//EN"
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


<html xmlns="http://www.w3.org/1999/xhtml">
 
<head>
    
<style type="text/css">
span 
  {
	visibility:hidden;
  	color:red;
  }
</style>
<script type="text/javascript">
    
//<![CDATA[
//check if all the fields all filled out with valid inputs
function validate()
	{       //check if the fields have been filled
		input_set=true; 
		if (document.registration.email.value=="")
			{
				document.registration.email.focus();
				//show the error (it will be a red astrix in front of the empty field!)		
				document.getElementById("span1").style.visibility="visible";
				input_set=false;
			}
		else if	(!document.forms.registration.email.value.match(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/))   
			{
				document.registration.email.focus();
				//replace the red astrix with the following error message in red!!!
				document.getElementById("span1").innerHTML="Please enter a valid email address.";
				document.getElementById("span1").style.visibility="visible";
				input_set=false;		 
 			} 
		else    document.getElementById("span1").style.visibility="hidden";
		if (document.registration.pass1.value=="")
			{
				document.getElementById("span2").style.visibility="visible";
				if (input_set)
					{
					   document.registration.pass1.focus()
					   input_set=false;
					}
			}
		
		else if (!document.forms.registration.pass1.value.match(/[A-Za-z]/) || !document.forms.registration.pass1.value.match(/[0-9]/) || document.forms.registration.pass1.value.match(/\W/) || document.forms.registration.pass1.value.length<6)
				{
					document.getElementById("span2").innerHTML="Password cannot be entirely numeric or entirely alphabetical and at least 6 characters.";
					document.getElementById("span2").style.visibility="visible";
					document.registration.pass1.focus();
					input_set=false;
				}
		else    document.getElementById("span2").style.visibility="hidden";
		if (document.registration.pass2.value=="")
			{
				document.getElementById("span3").style.visibility="visible";
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
		else	document.getElementById("span3").style.visibility="hidden";
		if (!input_set)
			{
				document.getElementById("span4").style.visibility="visible";
				return false;
			}
		
	}
//]]>
</script>
</head>
	<body>
		<form name="registration" action="register.php" method="post" onsubmit="return validate();"/>
			Please enter your email address as user name:<input type="text" name="email" /><span id="span1">*</span><br />
			Password<input type="password" name="pass1" id="pass1" /><span id="span2">*</span><br />
			Password<input type="password" name="pass2" /><span id="span3">*</span><br />
			<span id="span4">Please fill out all the required fields.</span>
			<input type="submit" name="submit" value="submit" onsubmit="return validate();" />
		</form>
	</body>
</html>