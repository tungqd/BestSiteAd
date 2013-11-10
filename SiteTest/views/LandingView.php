<!-- Use stars.js for rating system -->
<script type="text/javascript" src="./views/stars.js"></script>
<?php
/**
* View class for landing page, which inherits from BaseView.php class
* @author Loc Dang, Tung Dang, Khanh Nguyen
*
*/
require_once("./views/BaseView.php");

class LandingView extends BaseView
{
    
    function __construct()
    {
        parent::__construct();
    }
    
    /**
    * Display featured poem. 
    * If the time interval is greater than 10 minutes, display another poem.
    */
    function displayPoem()
    {
        //Check if 10 minutes is up
        if ($this->controller->isDue()) {
            $result = $this->controller->randomPoem();
            if ($result)
                $this->controller->sendTimeStamp($result[0]);
        }
        //Redisplay the current featured poem
        else {
            $result = $this->controller->featuredPoem();
        }
        return $result;
    }
}
    $obj = new LandingView();
?>

<h1><a href="index.php"><?php echo SITENAME; ?></a></h1>
<div id="wrapper" class="landingPage">

    <div id="poemWrapper">
        <div id="poem">
                <table>
                    <tr>
                        <th class="PoemTitle">Title:
                            <?php
                                 $result_array = $obj->displayPoem();
                                 echo $result_array[1];
                            ?>
                        </th>
                    </tr>
                    <tr>
                        <td class="PoemAuthor"><b>Author:</b><?php echo $result_array[2];?></td>
                    </tr>   
                    <tr>
                        <td class="PoemContent"><b>Content:</b><br/><?php 
                            $content_array = explode("\n",$result_array[3]);
                            foreach ($content_array as $line) {
                                echo $line."<br/>";
                            }
                        ?>
                        </td>
                    </tr>   
                </table>    
        </div> <!-- close poem div -->
        
        <!-- Pass poemID to javascript variable -->
        <script type="text/javascript">
            var pid = "<?php echo $result_array[0]; ?>";
            var view = "LandingView";
        </script>
        
        <div id="ratewrapper">
        
            <div id="rate"> 
            <?php
                if ($_SESSION["rate"] != 0) {
            ?>
                <div class="selectedMsg">You have rated <?php echo $_SESSION["rate"];?> out of 5.</div>
            <?php 
                } 
            ?>
                Your Rating:
            <?php
                for($j=1; $j<=$_SESSION["rate"]; $j++) {
            ?>
	                <img id="<?php echo $j; ?>" onclick="rate(<?php echo $j; ?>)" onmouseover="highlight(<?php echo $j; ?>)" onmouseout="unHighLight(<?php echo $j; ?>)" src="./css/greenStar.png" alt="star"/>
            <?php 
                } 
                for($i=$_SESSION["rate"]+1; $i<=5; $i++) {
            ?>
	                <img id="<?php echo $i; ?>" onclick="rate(<?php echo $i; ?>)" onmouseover="highlight(<?php echo $i; ?>)" onmouseout="unHighLight(<?php echo $i; ?>)" src="./css/grayStar.png" alt="star"/>
            <?php 
                }
            ?>
                <br/>
                <div id="rating"></div>
            </div> <!-- close div id="rate" -->

            <div id="userRate"> User Rating:
            <?php
                $stars = $obj->displayStars($result_array[0]);
                $wholestars = intval($stars); 
                for($i=1;$i<=$wholestars;$i++) { 
            ?>
                    <img id="s.<?php echo $i;?>" src="./css/greenStar.png" alt="rate star"/>
            <?php 
                }
                if (($stars - $wholestars) >0) {
            ?>
                    <!-- display half star -->
                    <img id="halfstar" src="./css/halfgreenStar.png" width="30" height="30" alt="halfstar"/>
           <?php
                }
                for($j=ceil($stars)+1;$j<=5;$j++) { 
            ?>  
                    <img id="s.<?php echo $j;?>" src="./css/grayStar.png" alt="rate star"/>
            <?php 
                }
            ?>
            </div> <!-- close div id="userRate" -->
        </div><!-- close div id="ratewrapper" -->

        <div id="link">
            <a href="index.php?c=main&amp;view=PoemView&amp;ac=chooseRandom">Choose Random Poem</a>
            <br/>
            <a href="index.php?c=poem&amp;view=SubmitView&amp;ac=uploadPoem">Upload a poem</a>
        </div>
    </div><!-- close div id="poemWrapper" -->
    
    <div class="right">
        <div id="topHighest">
            <b class="highest">Top 10 highest rating</b><br/>
            <?php
                $topTenArray = $obj->displayTopTen();
                foreach ($topTenArray as $topPoem) {
            ?>
                    <a href="index.php?c=main&amp;view=PoemView&amp;ac=displayPoem&amp;e=<?php echo $topPoem['ID']; ?>">
            <?php echo $topPoem['title'];?></a><br/>
            <?php 
                }
            ?>
        </div> <!-- close div id="topHighest" -->

        <div id="topRecent">
            <b class="highest">Top 10 most recent</b><br/>
            <?php
                $topRecentArray = $obj->displayTopRecent();
                foreach ($topRecentArray as $recentPoem) {
            ?>
                    <a href="index.php?c=main&amp;view=PoemView&amp;ac=displayPoem&amp;e=<?php echo $recentPoem['ID']; ?>">
            <?php echo $recentPoem['title'];?></a><br/>
            <?php
                }
            ?>
        </div> <!-- close div id="topRecent" -->
    </div> <!-- close div class="right"-->
</div> <!-- close div id="wrapper"-->
