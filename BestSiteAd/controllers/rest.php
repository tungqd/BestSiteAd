<?php
/**
* poem.php
* 
* Poem controller handles adding poem
* @author   Tung Dang, Loc Dang, Khanh Nguyen
*
*
*/
require_once('./models/model.php');
require_once('API.php');

class Rest extends API
{

    private $model;
    function __construct()
    {
        $this->model = new model();
    }
    
    /**
    * Call to display Submit Poem Page or Landing Page
    */
    function restController($method)
    {
        if($method == "getad") {
           //echo "GET AN AD";
            $this->getAd();
        }
    }
    /**
    * Get ad method
    */
    function getAd()
    {
        $array =$this->model->getRandomAd();
        $xml= new SimpleXMLElement("<?xml version=\"1.0\"?><ad></ad>");
        foreach($array as $key => $value) {
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
    }
}
?>
