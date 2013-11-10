<?php
/**
* Base class contains common methods displayPoem(), displayTopRecent() and displayStars($pid).
* It has an abstract method displayPoem() that will be implemented in its child classes.
* @author Loc Dang, Tung Dang, Khanh Nguyen
*
*/
require_once("./controllers/main.php");
abstract class BaseView
{   

    protected $controller;
    function __construct()
    {    
        $this->controller = new main();
    }
    
    abstract function displayPoem();
    
    /**
    * Display top 10 highest rated poems' title
    */
    function displayTopTen() 
    {
        $result = $this->controller->topTen();
        return $result;
    }
    
    /**
    * Display top 10 most recent submited poems' title
    */
    function displayTopRecent()
    {
        $result = $this->controller->topMostRecent();
        return $result;
    }
    
    /**
    * Display User rating for a poem
    * @param pid id of a poem
    */
    function displayStars($pid)
    {
        $result = $this->controller->aveRating($pid);
        return $result;
    }
   
}
?>


