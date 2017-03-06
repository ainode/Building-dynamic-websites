<?php

    require "templates/begin.php";	
    $dom = simplexml_load_file("http://feeds.finance.yahoo.com/rss/2.0/headline?s=".$_GET["symbol"]."&region=US&lang=en-US");

?>
	

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


	<html xmlns="http://www.w3.org/1999/xhtml">

	  <head>

	    <title><?php print($_GET["symbol"]);?></title>
	
  </head>

	  <body>
	
    <h1><?php print($_GET["symbol"]);?></h1>

	    <ul class="news">
      <?php foreach ($dom->channel->item as $item): ?>

	
        <li class="news"><a class="news" href="<?php print($item->link) ?>"><?php print(htmlspecialchars($item->title)); ?></a></li>

      <?php endforeach ?>
    </ul>
  </body>
</html>
<?php
	require "templates/end.php";
?>