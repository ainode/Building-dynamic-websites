<?php
	require "/templates/begin.php";
?>
<div id="quote"><br/><p style="text-align:center"><b><?php if($_SESSION['complete']) { $_SESSION['complete'] = FALSE;?>Transaction completed<?php } else {?>Trade with confidence<?php } ?></b></p><br/><br/><br/></div> 
		<form action="login.php" name="login" id="login" method="post" style="display:none;" onsubmit="return validate_login();">
      
		<div id="logdiv"><span id="span1">*</span><span id="span2">*</span> <span id="span4">Please fill out all the required fields.</span></div>
		<table>
        
		   <tr>
          
			<td>Username:</td>
          
			<td>
            <input name="user" id="user" type="text" /></td>
        
		   </tr>
        
		   <tr>
          
			<td>Password:</td>
          
			<td><input name="pass" id="pass" type="password" /></td>
 
      
		   </tr>
        
		   <tr>
          
		 	<td></td>
          
			<td><input type="submit" value="Log In" /></td>
        
		   </tr>
      
		</table>      
    
	        </form>
  
<?php
	require "/templates/end.php"
?>

