<?php
/**
* ad.php
* 
* Ad controller handles adding advertisement.
* @author   Tung Dang, Loc Dang, Khanh Nguyen
*
*
*/
require_once('./models/model.php');

class Ad
{
    private $model;
    function __construct()
    {
        $this->model = new model();
    }
    
    /**
    * Call to display Submit Ad or Delete Ad
    */
    function adController()
    {
        if(isset($_GET["ac"]) && $_GET["ac"] == "deleteAd"){
            $this->model->deleteAd($_GET["adID"]);
        }
        else if(isset($_POST["ac"]) && $_POST["ac"] == "addAd"){
            $this->addAnAd($_POST['title'],$_POST['url'],$_POST['description']);
        }
        $_SESSION['view'] = "LandingView"; 
        
    }
    /**
    * Add an ad to database
    * @param $title ad title
    * @param $url ad url
    * @param $description ad description
    * Call addAd function of model
    */
    function addAnAd($title, $url, $description) {
        return $this->model->addAd($title, $url, $description);
    }
}
?>