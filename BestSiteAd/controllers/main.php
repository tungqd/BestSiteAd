<?php
/**
* BestSiteAd main.php
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
    * Call to display Landing Page or handles reset counter
    */
    function mainController()
    {
        if (isset($_GET["ac"]) && $_GET["ac"] == "resetCount") {
            $this->resetClicks();
        }
        $_SESSION['view'] = "LandingView";

    }
    
    /**
    * Get all ads by calling getAds function of model
    * @return array of ads
    */
    function getAllAds()
    {
        $array = $this->model->getAds();
        $result = array();
        foreach($array as $name => $value) {
           $result[] = $value;
        }
        return $result;
    }
    
    /**
    * Get number of clicks for an ad
    * @param adID ID of an ad
    * @return an ad's counter
    */
    function getClicks($adID)
    {
        $counter = $this->model->getCounter($adID);
        return $counter;
    }
    
    /**
    * Reset counter 
    * @return Calling resetCounter() function of model
    */
    function resetClicks()
    {
        return $this->model->resetCounter();
    }
}
?>