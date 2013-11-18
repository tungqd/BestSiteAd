<?php
/**
*
* Proxy script get ad data from REST service
* @return xml data containg ad data
*/
require_once('./config/config.php');

$curl = curl_init();
$path = PATH;
$url = $path."get-ad/?format=".FORMAT;
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl);
    
if (FORMAT == "xml") {            
    $xml = simplexml_load_string($result);
    header('Content-type: text/xml');
    print $xml->asXML();  
    curl_close($curl);  
    
}
else if (FORMAT== "json") {
    $response = json_decode($result,true);
    $xml= new SimpleXMLElement("<ad></ad>");  
    foreach($response as $key => $value) {
        if(is_array($value)) {
            if(!is_numeric($key)){
                $subnode = $xml->addChild("$key");
                array_to_xml($value, $subnode);
            }
            else{
                $subnode = $xml->addChild("item$key");
                array_to_xml($value, $subnode);
            }
        }
        else {
            $xml->addChild("$key","$value");
        }
    }
    header('Content-type: text/xml');
    print $xml->asXML();  
    curl_close($curl); 
}
else {
    echo "Failed";
}
?>