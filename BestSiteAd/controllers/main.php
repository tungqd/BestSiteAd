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
    * Main controller handles retrieving poem info.
    */
    function mainController()
    {
        global $data;
        if (!isset($_SESSION["rate"]))
        {
            $_SESSION["rate"] = 0;
        }
        
        if (isset($_GET["ac"]) && $_GET["ac"] == "displayPoem")
        {
            $this->clearSelectedStars();
            $data = $_GET["e"];
            $_SESSION["view"] = "PoemView";
        }
        
        else if (isset($_GET["ac"]) && $_GET["ac"] == "chooseRandom")
        {
            $this->clearSelectedStars();
            $array = $this->randomPoem();
            $data = $array[0];
            $_SESSION["view"] = "PoemView";
        }

        else if(isset($_GET["ac"]) && $_GET["ac"] == "ratePoem")
        {
            $this->addRating($_GET['pid'], $_GET['stars']);
            $data = $_GET['pid'];
            $_SESSION["rate"] = $_GET['stars'];    
            $_SESSION["view"] = $_GET["view"];
        } 
        else 
        {
            $this->clearSelectedStars();
            $_SESSION["view"] = "LandingView";
        }
    }

    /* Get a random poem by calling getRandomPoem() from Model
    * @return an array containing contents of id, title, author, content, timeSelected of a poem.
    */
    function randomPoem()
    {
       $array = $this->model->getRandomPoem();
       $result = array();
       foreach($array as $name => $value) {
           $result[] = $value;
       }
       return $result;
    }
    
    /* Get a featured poem by calling getFeaturedPoem() from Model
    * @return an array containing contents of id, title, author, content, timeSelected of a poem.
    */
    function featuredPoem()
    {
        $array = $this->model->getFeaturedPoem();
        $result = array();
        foreach($array as $name => $value) {
            $result[] = $value;
        }
       return $result; 
    }

    /* Get a poem by calling getAPoem(id) from Model
    * @param id the id of the poem
    * @return an array containing contents of id, title, author, content, timeSelected of a poem.
    */
    function getPoem($id)
    {
       $array = $this->model->getAPoem($id);
       $result = array();
       foreach($array as $name => $value) {
           $result[] = $value;
       }
       return $result;
    }
    
    /* Get top 10 highest rated poems by calling getTopTen() from Model
    * @return an array containing top 10 highest rated poems' titles
    */
    function topTen()
    {
       $array = $this->model->getTopTen();
       $result = array();
       foreach($array as $name => $value) {
           //truncate array, return only ID and title
           $value = array_slice($value,0,2);
           $result[] = $value;
       }
       return $result;
    }
    
    /* Get top 10 most recent submitted poems by calling getTenMostRecent() from Model
    * @return an array containing top 10 most recent submitted poems' titles
    */
    function topMostRecent()
    {
       
       $array = $this->model->getTenMostRecent();
       $result = array();
       foreach($array as $name => $value) {
           //truncate array, return only ID and title
           $value = array_slice($value,0,2);
           $result[] = $value;
       }
       return $result;
    }

    /** Get average rating for a poem by calling getAveRating($id) from Model
    * @param id the id of the poem
    * @return average rating
    */
    function aveRating($id)
    {
       return $this->model->getAveRating($id); 
    }
  
    /** Add rating to rating table by calling addRating() from Model
    * @param pID poem ID
    * @param rating the user rating for this poem
    */
    function addRating($pID, $rating)
    {
        $this->model->addRating($pID,$rating);
    }
    
    /**
    * Send the time when a new featured poem selected back to database
    * @param id the id of the poem
    */
    function sendTimeStamp($id)
    {
        $this->model->setFeaturedPoemTimeStamp($id);
    }
    
    /** Check time interval of featured poem by calling isTenMinuteDue() from Model
    * @return true if time interval is greater than 10 minutes
    */
    function isDue()
    {
        return $this->model->isTenMinuteDue();
    }
    
    /** 
    * Clear star rating in current session
    */
    function clearSelectedStars()
    {
        $_SESSION["rate"] = 0;
    }
}
?>
