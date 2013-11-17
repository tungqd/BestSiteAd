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

class Rest
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
        $req = $_REQUEST;
        switch ($method)
        {
            case "get-ad":
                $this->getAd();
                break;
            case "increment-choice":
                $this->incrementChoice($req['adID']);
                break;
        }
    }

    /**
    * Get ad method
    */
    function getAd()
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
        header('Content-type: text/xml');
        print $xml->asXML();
    }
    /**
    *
    */
    function incrementChoice($adID)
    {
        $this->model->incCounter($adID);
    }
}
?>
