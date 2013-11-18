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
    * Display featured poem. 
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
    <div class="ads">
        <div class="dummyAd">
            <label><strong>Title:</strong>News Story</label><br/>
            <label><strong>Description:</strong>Actual news story</label><br/>
            <label><strong>Number of clicks:</strong></label><?php echo $obj->getCount(0);?>
        </div>
        <?php
            $ads = $obj->displayAd();
            foreach($ads as $ad) {
                $count = $obj->getCount($ad['adID']);
        ?>
            <div class="adItem">
            <label><strong>Title:</strong></label><?php echo $ad['title']; ?><br/>
            <label><strong>Description:</strong></label><?php echo $ad['description'];?><br/>
            <label><strong>Number of clicks:</strong></label><?php echo $count;?><br/>
            <a href="index.php?c=ad&ac=deleteAd&adID=<?php echo $ad['adID'];?>">Delete Ad</a><br/>
            </div><!-- close div id="adItem" -->
        <?php
        }
        ?>
    </div><!-- close div id="ads" --> 
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

