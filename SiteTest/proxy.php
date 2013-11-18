<?php

require_once('./config/config.php');

$curl = curl_init();
$path = "http://localhost/CS174/Hw4/BestSiteAd/index.php/get-ad/";
$url = $path.'?format='.FORMAT;
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl);
    
if (FORMAT == "xml")
{            
        $xml = simplexml_load_string($result);
  //  $result = array();
   // $result['adID'] = (string)$xml->adID;
    //$result['title'] = (string)$xml->title;
    //$result['url'] = (string)$xml->url;
    //$result['description'] = (string)$xml->description;
    header('Content-type: text/xml');
    print $xml->asXML();  
    curl_close($curl);  
    
}
else if (FORMAT== "json")
{
    $response = array();
    $response = json_decode($result,true);   
    curl_close($curl);
    print_r ($result);
}
else
{
    echo "Failed";
}
?>