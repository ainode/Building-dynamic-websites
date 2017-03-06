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
 <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="stylesheet/style1.css" rel="stylesheet" type="text/css" />
 </head>
<body>

<div class="header">
<div class="menuzone">
<table width="100%">
  <tr bgcolor="#FF8080">
   <td onmouseover="conjuremenu('hdr')" onmouseout="hidemenu('hdr')"><a href="../temp.htm">suv</a><br />
    <table class="menu" id="hdr">
     	        <? foreach($items as $item) { ?>
      	         <tr ><td class="menu"><a href="category.php?category=<? print($item[name]);?> "><?print($item[name]);?></a></td></tr><? } ?>
  	       </table>
   </td>
   <td onmouseover="conjuremenu('trk')" onmouseout="hidemenu('trk')">truck<br />
    <table class="menu" id="trk">
     <tr><td class="menu">honda truck</td></tr>
     <tr><td onmouseover="conjuremenu('mzd')" onmouseout="hidemenu('mzd')"><a href="C:\Users\User\Desktop\test.html">mazda truck</a>
          <table id="mzd" class="menu">  
           <tr><td id="mzd" class="menu">big mazda truck</td></tr>
           <tr><td class="menu">small mazda truck</td></tr>
          </table>
          </td>   
     </tr>
    </table>
   </td> 
   <td onmouseover="conjuremenu('mnvn')" onmouseout="hidemenu('mnvn')">minivan<br />
    <table class="menu" id="mnvn">
     <tr><td class="menu">honda minivan</td></tr>
     <tr><td class="menu">mazda minivan</td></tr> 
    </table>
   </td>
  </tr>
</table>
</div>
</div>
</body>
</html>
