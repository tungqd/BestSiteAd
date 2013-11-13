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
 }   
    /**
    * Display 10 news items
    */
/*    function displayTenNews() 
    {
        $result = $this->controller->topTen();
        return $result;
    }
}
    $obj = new SiteTestView();
?>

<h1><a href="index.php"><?php echo SITENAME; ?></a></h1>
<div id="wrapper" class="siteTest">
    
    <div class="tenNewsItem">
        <div id="news">
            <b class="highest">10 random news items</b><br/>
            <?php
                $tenArray = $obj->displayTopTen();
                foreach ($tenArray as $tenItems) {
            ?>
                    <a href="index.php?c=main&amp;view=PoemView&amp;ac=displayPoem&amp;e=<?php echo $tenItems['ID']; ?>">
            <?php echo $tenItems['title'];?></a><br/>
            <?php 
                }
            ?>
        </div> <!-- close div id="news"-->
    </div> <!-- close div class="tenNewsItem"-->
</div> <!-- close div id="wrapper"-->
*/
?>
<h1> SiteTest </h1>