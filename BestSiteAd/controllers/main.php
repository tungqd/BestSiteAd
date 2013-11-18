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
    */
    function mainController()
    {
        if (isset($_GET["ac"]) && $_GET["ac"] == "resetCount") {
            $this->resetClicks();
        }
        $_SESSION['view'] = "LandingView";

    }
    function getAllAds()
    {
        $array = $this->model->getAds();
        $result = array();
        foreach($array as $name => $value) {
           $result[] = $value;
        }
        return $result;
    }
    function getClicks($adID)
    {
        $counter = $this->model->getCounter($adID);
        return $counter;
    }
    function resetClicks()
    {
        return $this->model->resetCounter();
    }

}
?>
