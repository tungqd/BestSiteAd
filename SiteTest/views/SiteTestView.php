<?php
/**
* View class for landing page, which inherits from BaseView.php class
* @author Loc Dang, Tung Dang, Khanh Nguyen
*
*/
//require_once("./views/BaseView.php");
require_once("./controllers/main.php");

class SiteTestView 
{
    protected $controller;
    function __construct()
    {    
        $this->controller = new main();
    }
   
    /**
    * Display 10 news items
    */
    function displayTenNews() 
    {
        $result = $this->controller->getTen();
        return $result;
    }
    
    /**
    * Display ad 0  
    * If the time interval is greater than 10 minutes, display another poem.
    */
    function displayAd()
    {
        $result = $this->controller->getAnAd();
        return $result;
    }
    
    function getAdCount()
    {
        return $count = $this->controller->getAdClicks();
    }
    
    function getNewsCount($ID)
    {
        return $count = $this->controller->getNewsClicks($ID);
    }
}
    $obj = new SiteTestView();

?>

<h1><a href="index.php"><?php echo SITENAME; ?></a></h1>
<b class="highest">10 random news items</b><br/><br/>
<div id="wrapper" class="siteTest">
    
    <div class="tenNewsItem"> 
            <?php
                $tenArray = $obj->displayTenNews();
                foreach ($tenArray as $key=>$tenItems) 
                {
                    if ($key == 1) {
            ?>          <div id="advertisement">Ad</div>
                <?php
                                $ad = $obj->displayAd();
                                $count = $obj->getAdCount();
                ?>
                            <label>Number of clicks:</label><?php echo $count;?><br/>
                <?php 
                    }
                ?>
                    <div id="news">       
                        <a href="index.php">
                            <?php echo $tenItems['title'];?></a><br/>
                        <?php echo $tenItems['content'];?><br>  
                        <?php
                            foreach($tenItems as $ID) 
                                $count = $obj->getNewsCount($tenItems['ID']);
                        ?>
                        <label>Number of clicks:</label><?php echo $count;?><br/>
                    </div> <!-- close div id="news"-->
            <?php 
                }
            ?>
        
    </div> <!-- close div class="tenNewsItem"-->
</div> <!-- close div id="wrapper"-->
