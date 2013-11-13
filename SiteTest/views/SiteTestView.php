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
}
    $obj = new SiteTestView();

?>

<h1><a href="index.php"><?php echo SITENAME; ?></a></h1>
<b class="highest">10 random news items</b><br/><br/>
<div id="wrapper" class="siteTest">
    
    <div class="tenNewsItem"> 
            <?php
                $tenArray = $obj->displayTenNews();
                foreach ($tenArray as $tenItems) {
            ?>
                <div id="news">       
                <a href="index.php">
                    <?php echo $tenItems['title'];?></a><br/>
                <?php echo $tenItems['content'];?><br>  
                </div> <!-- close div id="news"-->
            <?php 
                }
            ?>
        
    </div> <!-- close div class="tenNewsItem"-->
</div> <!-- close div id="wrapper"-->
