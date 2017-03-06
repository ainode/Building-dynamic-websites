<?php
        //header("Content-type: text/plain");


    // try to get quote

    $handle = new SimpleXMLElement(file_get_contents("http://api.bart.gov/api/etd.aspx?cmd=etd&orig={$_GET['abbr']}&key=TXDM-IRSN-TSSQ-US4B"));
    //$handle = new SimpleXMLElement(file_get_contents("http://api.bart.gov/api/etd.aspx?cmd=etd&orig=RICH&key=TXDM-IRSN-TSSQ-US4B"));

    if ($handle !== FALSE)

    {

	$destination = $handle->xpath("//destination");
        
        print("destination: {$destination[0]}\n");

            
            

        

       // fclose($handle);

    }

?>
