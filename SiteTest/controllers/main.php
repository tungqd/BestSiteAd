<?php
/**
* SiteTest main.php
*
* Main controller
*
* @author   Tung Dang, Loc Dang, Khanh Nguyen
*
*
*/
require_once('./models/model.php');
class main
{
    private $model;
    
    /**
    *
    * Default constructor
    */
    function __construct()
    {
        $this->model = new model();   
    }
    /**
    * Get an ad from REST API
    * @return associative array containing title, url, description of the ad
    */
    function getAd()
    {
        $curl = curl_init();
        $url = "http://localhost/CS174/Hw4/BestSiteAd/index.php/getad/?format=xml";
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        
        $xml = simplexml_load_string($result);
        $result = array();
        $result['title'] = $xml->title;
        $result['url'] = $xml->url;
        $result['description'] = $xml->description;
        curl_close($curl);
        
        return $result;
    }
    /**
    *
    * Main controller
    */
    function mainController()
    {
        $array = $this -> getTen();
        $_SESSION['view'] = "SiteTestView";

    }
    function getTen()
    {
        $array = $this->model->getTenRandom();
        $result = array();
        foreach($array as $name => $value) {
           $result[] = $value;
        }
        return $result;
    }
}
?>
