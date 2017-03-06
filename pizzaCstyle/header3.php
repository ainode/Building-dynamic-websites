<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Home</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="stylesheet/style.css" rel="stylesheet" type="text/css" />
 	<script type="text/javascript">
  	function conjuremenu(a)
{
        document.getElementById(a).style.visibility="visible";
}
	function hidemenu(a)
{
    	document.getElementById(a).style.visibility="hidden";
} 
        </script>
</head>
<body>
<div id="wrapper">
  <div class="header">
    <div style="position:absolute; left: 32px;"></div>
    <div class="header-left"> <a href="#"></a> </div>
    <div class="header-right">Phone : +91-0000-0000<br />
      +91-0000-0000</div>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
  <div class="menuzone">
    <div class="menuleft">
      <div class="menuright">
        <div class="mainmenu">
          
            <table class="mainmenu" width="800px">
	     <tr >
	      <td class="mainmenu"><a href="#">Home</a></td>
              <td class="mainmenu"><a href="#">About Us</a></td>
              <td class="mainmenu"onmouseover="conjuremenu('hdr')" onmouseout="hidemenu('hdr')"><a href="../temp.htm">Menu</a>
	       <table class="dropdown" id="hdr">
     	        <?php foreach($items as $item) { ?>
      	         <tr ><td class="dropdown"><a href="category.php?category=<?php print($item["name"]);?> "><?php print($item["name"]);?></a></td></tr><?php } ?>
  	       </table>
	      </td>
              <td class="mainmenu"><a href="#">Services</a></td>
              <td ><a href="#">Support</a></td>
              <td ><a href="#">Privacy</a></td>
              <td style="background:none;"><a href="#">Contact Us</a></td>
             </tr>
	  </table>
        </div>
      </div>
    </div>
  </div>
  <div class="clear"></div>
  <div class="container">
    <div class="container-left">
      <div>
       <div class="banner">