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
require_once('./views/SiteTestView.php');
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
    * Call to ad click or inject
    */
    function mainController()
    {
        $array = $this -> getTen();
        $_SESSION['view'] = "SiteTestView";
        if (isset($_GET['ac']) && $_GET['ac'] == "adclick") {
            $this->adClick($_GET['adID']);
            $this->redirect($_GET['url'], 303);
        }
        else if (isset($_GET['ac']) && $_GET['ac'] == "inject") {
            $this->inject();
        }
        $view = new SiteTestView();
        
    }
    /**
    * Get ten random news from model
    * @return associative array
    */
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
    * function can be used to get ad data if not using proxy
    * @return associative array containing adID, title, url, description of the ad
    */
    /*function getAd()
    {
        $curl = curl_init();
        $url = GETAD_URL.FORMAT;
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
        
    }*/
    
    /**
    * Increment ad counter by 1 when the ad is clicked
    * @param $adID ID of the ad
    * @return Increment ad counter by 1 when ad is clicked
    */
    function adClick($adID)
    {
        $curl = curl_init();
        $url = INCRE_URL.$adID;
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        curl_close($curl);
    }
    
    /**
    * Perform redirection
    * @param $url to be redirected to
    * @param $statusCode statusCode
    */
    function redirect($url, $statusCode = 303)
    {
       header('Location: ' . $url, true, $statusCode);
       die();
    }
    
    /**
    * Perform SQL injection    *
    */
    function inject()
    {
        $curl = curl_init();
        $url = INCRE_VUL.SQL;
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
         curl_close($curl);
    }
}
?>