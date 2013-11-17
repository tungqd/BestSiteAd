<?php
/**
* View class for landing page
* @author Loc Dang, Tung Dang, Khanh Nguyen
*
*/
require_once("./controllers/main.php");

class LandingView 
{
    protected $controller;
    function __construct()
    {    
        $this->controller = new main();
    }

    /**
    * Display ad. 
    * If the time interval is greater than 10 minutes, display another poem.
    */
    function displayAd()
    {
        $result = $this->controller->getAllAds();
        return $result;
    }
    
    
    function getCount($adID)
    {
        return $count = $this->controller->getClicks($adID);
    }
}
    $obj = new LandingView();
?>

<h1><a href="index.php"><?php echo SITENAME; ?></a></h1>
<div id="wrapper" class="landingPage">

    <div id="product">
        <div id="productItem">
            <p>Laundry Detergent</p>
            <div id="adWrapper">
            <div id="adItem">
                <p>Four Ads for Laundry Detergent</p>
                <?php
                    $ads = $obj->displayAd();
                    foreach($ads as $ad) {
                        $count = $obj->getCount($ad['adID']);
                ?>
                    <label>Title:</label><?php echo $ad['title']; ?><br/>
                    <label>Description:</label><?php echo $ad['description'];?><br/>
                    <label>Number of clicks:</label><?php echo $count;?><br/>
                    <a href="index.php?c=ad&ac=deleteAd&adID=<?php echo $ad['adID'];?>">Delete Ad</a><br/>
                <?php
                }
                ?>
            </div><!-- close div id="adItem" -->
            </div><!-- close div id="adwrapper" -->
         </div> <!-- close div id="productItem" -->
    </div><!-- close div id="product" -->
    
    <div class="right">
        <div id="submitAd">
            <form onSubmit="return doCheck();" action="index.php?c=ad" id="addNewAd" name="addAd" method="POST">
                <input type="hidden" name="ac" value="addAd">
                <lable>Title:</lable><input type="text" name="title"/><br/>
                <lable>URL:</lable><input type="text" name="url"/><br/>
                <label>Description:</label><br/>
                <textarea rows="5" cols="50" name="description"></textarea>
                <input type="submit" value="Submit"/>
            </form>
        </div> <!-- close div id="submitAd" -->

        <div id="resetLink">
            <a href="index.php?c=main&ac=resetCount">Reset Counter</a>
        </div> <!-- close div id="resetLink" -->
    </div> <!-- close div class="right"-->
</div> <!-- close div id="wrapper"-->

<script type="text/javascript">
/**
* Javascript function doCheck() checks for non-null input when submitting new ad.
* 
*/
    function doCheck()
    {
        var x=document.getElementById("addNewAd");
        var title = x.elements[1].value;
        var titleLength = title.length;
        var content = x.elements[2].value;
        var contentLength = content.length;
        
        /* Null input for title */
        if (titleLength == 0)
        {
            alert("Please enter Title.");
            return false;
        }
        
        
        else if (titleLength > 0)
        {
            /* Null input for author */
            if (contentLength == 0)
            {
                alert("Please enter your Ad's URL.");
                return false;
            }
        }   
        return true;
    }
</script>

