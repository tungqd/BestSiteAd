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
    
    function getAnAd()
    {
        $array = $this->model->getAd();
        var_dump($array);
        //return $result;
    }
    
    function getAdClicks()
    {
        $counter = $this->model->getAdCounter();
        return $counter;
    }
    
    function getNewsClicks($ID)
    {
        $counter = $this->model->getNewsCounter($ID);
        return $counter;
    }
   
}
?>
