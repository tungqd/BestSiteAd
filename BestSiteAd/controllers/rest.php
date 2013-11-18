<?php
/**
* rest.php
* 
* REST Service controller handles getting ads and increment counters
* @author   Tung Dang, Loc Dang, Khanh Nguyen
*
*
*/
require_once('./models/model.php');

class Rest
{
    private $model;
    function __construct()
    {
        $this->model = new model();
    }
    
    /**
    * Call appropriate functions based on method name
    * @param method Name of method desired
    * 
    */
    function restController($method)
    {
        $req = $_REQUEST;
        switch ($method)
        {
            case "get-ad":
                $this->getAd($req['format']);
                break;
            case "increment-choice":
                $this->incrementChoice($req['adID']);
                break;
            case "increment-vulnerable":
                $this->incrementVul($req['adID']);
                break;
        }
    }
    /**
    * Get ad method 
    * @param format Document type
    * @return ad data in either XML or JSON
    */
    function getAd($format)
    {
        $array =$this->model->getRandomAd();
        $xml= new SimpleXMLElement("<ad></ad>");
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
        if ($format == "xml"){
            header('Content-type: text/xml');
            print $xml->asXML();        
        }
        else if ($format == "json"){
            header('Content-type: application/json; charset=utf-8');
            print json_encode($xml);   
        }
    }
    
    /**
    * Increment counter of an ad when it is clicked
    * @param adID ID of an ad
    * @return Call incCounter() function of model
    */
    function incrementChoice($adID)
    {
        $this->model->incCounter($adID);
    }
    
    /**
    * Increment counter which is vulnerable to SQL injection attack
    * @param adID ID of an ad
    * @return Call incCounterVul() function of model
    */
     function incrementVul($adID)
     {
         $this->model->incCounterVul($adID);
     }
}
?>