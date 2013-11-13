<?php
/**
* main.php
*
* Main controller handles retrieveing poem and rating info, adding rating
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
        $_SESSION['view'] = "SiteTestView";
    }
}
?>
