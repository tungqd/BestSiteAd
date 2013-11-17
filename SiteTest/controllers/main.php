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
    function getAd()
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "http://localhost/CS174/Hw4/BestSiteAd/index.php/getad/?format=xml");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        
        $xml = simplexml_load_string($result);
        echo $xml->adID."<br/>";
        echo $xml->title."<br/>";
        echo $xml->url."<br/>";
        curl_close($curl);
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
