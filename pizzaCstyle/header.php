<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<? 
    $xml = new SimpleXMLElement(file_get_contents("menu.xml"));
    $items=$xml->xpath("//category"); 
?>
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
<title>Home</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="stylesheet/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="wrapper">
  <div class="header">
    <div style="position:absolute; left: 32px;"></div>
    <div class="header-left"> <a href="#"><img src="images/logo.jpg" alt="New-york-lasik" border="0" /></a> </div>
    <div class="header-right">Phone : +91-0000-0000<br />
      +91-0000-0000</div>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
  <div class="menuzone">
    <div class="menuleft">
      <div class="menuright">
        <div class="mainmenu">
          <ul>
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#">About Us</a></li>
            <li onmouseover="conjuremenu('hdr')" onmouseout="hidemenu('hdr')"><a href="../temp.htm">Menu</a>
	    <table class="menu" id="hdr">
     	    <? foreach($items as $item) { ?>
      	    <tr><td class="menu"><a href="category.php?category=<? print($item[name]);?> "><?print($item[name]);?></a></td></tr><? } ?>
  	    </table>
	    </li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Support</a></li>
            <li><a href="#">Privacy</a></li>
            <li style="background:none;"><a href="#">Contact Us</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="clear"></div>
  <div class="container">
    <div class="container-left">
      <div>
        <div class="banner">
<?require_once("footer.php");?>