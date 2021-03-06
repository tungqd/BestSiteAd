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
    * Display ads. 
    * Call getAllAds() function of main controller
    * @return array of ads
    */
    function displayAd()
    {
        $result = $this->controller->getAllAds();
        return $result;
    }
    
    /**
    * Get counter
    * @param $adID ID of an ad
    * @return counter of an ad
    */
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
            <label><strong>Title: </strong>News Story</label><br/>
            <label><strong>Description: </strong>Actual news story</label><br/>
            <label><strong>Number of clicks: </strong></label>
                            <?php echo $obj->getCount(0);?>
        </div>
        <?php
            $ads = $obj->displayAd();
            foreach($ads as $ad) {
                $count = $obj->getCount($ad['adID']);
        ?>
        <div class="adItem">
            <label><strong>Title: </strong></label>
            <?php echo $ad['title']; ?><br/>
            <label><strong>URL: </strong></label>
            <a href="<?php echo $ad['url'];?>"><?php echo $ad['url'];?></a><br/>
            <label><strong>Description: </strong></label>
            <?php echo $ad['description'];?><br/>
            <label><strong>Number of clicks: </strong></label>
            <?php echo $count;?><br/>
            <a href="index.php?c=ad&amp;ac=deleteAd&amp;adID=<?php echo $ad['adID'];?>">Delete Ad</a><br/>
        </div><!-- close div id="adItem" -->
        <?php
        }
        ?>
    </div><!-- close div class="ads" --> 
    
    <div class="right">
        <div id="submitAd">
            <form onSubmit="return doCheck();" 
            action="index.php?c=ad" id="addNewAd" name="addAd" method="POST">
                <input type="hidden" name="ac" value="addAd">
                <label>Title:</label><input type="text" name="title"/><br/>
                <label>URL:</label><input type="text" name="url"/><br/>
                <label>Description:</label><br/>
                <textarea rows="5" cols="50" name="description"></textarea>
                <input type="submit" value="Submit"/>
            </form>
        </div> <!-- close div id="submitAd" -->
        <div id="resetLink">
            <a href="index.php?c=main&amp;ac=resetCount">Reset Counter</a>
        </div> <!-- close div id="resetLink" -->
    </div> <!-- close div class="right"-->
</div> <!-- close div id="wrapper"-->

<script type="text/javascript">
/**
* Javascript function doCheck() checks for non-null input 
* when submitting new ads.
* 
*/
    function doCheck()
    {
        var x=document.getElementById("addNewAd");
        var title = x.elements[1].value;
        var titleLength = title.length;
        var url = x.elements[2].value;
        var urlLength = url.length;
        var description = x.elements[3].value;
        var descLength = description.length;
        
        /* Null input for title */
        if (titleLength == 0)
        {
            alert("Please enter Title.");
            return false;
        }
        
        else if (titleLength > 0)
        {
            /* Null input for url */
            if (urlLength == 0)
            {
                alert("Please enter your Ad's URL.");
                return false;
            }
            
            /* Null input for description */
            else (urlLength != 0)
            {
                if(descLength == 0)
                {
                    alert("Please enter Description");
                    return false;
                }
            }
            
        }   
        return true;
    }
</script>