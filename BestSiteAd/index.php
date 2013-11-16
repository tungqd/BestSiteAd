<?php
/**
* index.php
*
* This file acts as entry point and calls appropriate controllers.
*
* @author   Tung Dang, Loc Dang, Khanh Nguyen
*
*
*/
session_start();
class BestSiteAd
{
    /**
    * Constructor
    */
    function __construct()
    {
        require_once('./config/config.php');
    }
    /**
    *
    * render function
    * @params $view view to be rendered
    */
    function render($viewname) {
        require_once("./views/{$viewname}.php");
    }
    /**
    * Calls appropriate controllers
    */
    function start()
    {
        // there are 2 controllers
        $controllers_available= array('main','poem');

        //deciding the controller to be run
        if(isset($_GET['c']) && in_array($_GET['c'],$controllers_available)){
            if("main"==$_GET['c']){
                $controller = "main";
            }
            else {
                $controller = $_GET['c'];
            }
        }
        else{
             $controller = "main";
        }

        //function pointer to call the controller
        $this->$controller();
    }  
     
    /**
    * main controller
    */
    function main()
    {
        require_once("./controllers/main.php");
        $main = new main();
        $main->mainController();
        $this->displayView($_SESSION['view']);
    }
    /**
    * poem controller
    */
    function poem()
    {
        require_once("./controllers/poem.php");
        $poem = new Poem();
        $poem->poemController();
        $this->displayView($_SESSION['view']);
    }
    
    /**
    *
    * displayView renders and displays specific view
    */
    function displayView($viewname)
    {
?>
        <!DOCTYPE HTML>

        <html>
            <head>
                <title>Best Site Ad</title>
                <meta name="author" content="Tung Dang, Loc Dang, Khanh Nguyen" />
                <meta name="description" content="A site provides REST services" />
                <meta name="keywords" content="HW4, items, ad, rest, api" />
                <meta charset="utf-8" />
                <meta name="ROBOTS" content="NOINDEX, NOFOLLOW"/>
                <link rel="stylesheet" type="text/css" href="./css/styles.css" />
            </head>
            
            <body>
            <?php   
                $this->render($viewname); 
            ?>
            </body>
        </html>
<?php
    }
}
$siteAd_obj = new BestSiteAd();
$siteAd_obj->start(); 
?>

