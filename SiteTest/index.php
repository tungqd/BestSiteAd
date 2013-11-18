<?php
/**
* index.php
*
* This file acts as entry point and calls appropriate controllers.
*
* @author   Tung Dang, Loc Dang, Khanh Nguyen
*
*
*/
session_start();

class BestSiteAd
{
    /**
    * Constructor
    */
    function __construct()
    {
        require_once('./config/config.php');
    }
    /**
    * Calls appropriate controllers
    */
    function start()
    {
        require_once("./controllers/main.php");
        $main = new main();
        $main->mainController();
        
    }
}
$site_obj = new BestSiteAd();
$site_obj -> start(); 
?>

