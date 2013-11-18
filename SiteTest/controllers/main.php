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
    *
    * Main controller
    */
    function mainController()
    {
        $array = $this -> getTen();
        $_SESSION['view'] = "SiteTestView";
        if (isset($_GET['ac']) && $_GET['ac'] == "adclick") {
            $this->adClick($_GET['adID']);
        }

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
    /**
    * Get an ad from REST API
    * @return associative array containing adID, title, url, description of the ad
    */
    function getAd()
    {
        $curl = curl_init();
        $url = "http://localhost/CS174/Hw4/BestSiteAd/index.php/get-ad/?format=".FORMAT;
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
            
        if (FORMAT == "xml")
        {            
            $xml = simplexml_load_string($result);
            $result = array();
            $result['adID'] = $xml->adID;
            $result['title'] = $xml->title;
            $result['url'] = $xml->url;
            $result['description'] = $xml->description;
            curl_close($curl);
            return $result;
            
        }
        else if (FORMAT == "json")
        {
            $response = array();
            $response = json_decode($result,true);   
            curl_close($curl);
            return $response;
        }
        
    }
    /**
    * increment ad counter by 1 when the ad is clicked
    * @param $adID ID of the ad
    * 
    */
    function adClick($adID)
    {
        $curl = curl_init();
        $url = "http://localhost/CS174/Hw4/BestSiteAd/index.php/increment-choice/?adID=".$adID;
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        curl_close($curl);
    }
}
?>
