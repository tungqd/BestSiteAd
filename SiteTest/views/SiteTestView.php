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
    function displayAd()
    {
        return $this->controller->getAd();
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
                foreach ($tenArray as $key=>$tenItems) {
                if ($key == 1) {
                    ?><div id="advertisement">
                        <?php
                           $ad = $obj->displayAd();
                        ?>
                            <a href="index.php?c=main&amp;ac=adclick&amp;adID=<?php echo $ad['adID'];?>&amp;url=<?php echo $ad['url'];?>">
                            <?php echo $ad['title'];?></a><br/>
                            <?php echo $ad['description'];?>
                    </div>
                <?php }
            ?>
                <div id="news">       
                <a href="index.php?c=main&amp;ac=adclick&amp;adID=0&amp;url=<?php echo $tenItems['url'];?>">
                    <?php echo $tenItems['title'];?></a><br/>
                <?php echo $tenItems['content'];?><br>  
                </div> <!-- close div id="news"-->
            <?php 
                }
            ?>
        
    </div> <!-- close div class="tenNewsItem"-->
</div> <!-- close div id="wrapper"-->
