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
    function render($viewname)
    {
        require_once("./views/{$viewname}.php");
    }
    
    /**
    *
    * Get method name from REST services call
    * @return $method name of method to be called 
    * or 0 if no method and arg is detected
    */
    function getMethod()
    {
        $url = $_SERVER['REQUEST_URI'];
        if (strpos($url, "/index.php/")) {
            list($hostname,$request) = explode("/index.php/",$url);
            if (strpos($request, "/?")) {
                list ($method, $args) = explode("/?", $request);
                return $method;
            }
            else {
                return null;
            }
        } 
        else {
            return null;
        }
    }
    
    /**
    * Calls appropriate controllers
    */
    function start()
    {
        $restReq = $this->getMethod();
        // there are 3 controllers
        $controllers_available= array('main','ad','rest');
        if ($restReq !==null) {
            $controller = "rest";
        }
        else if(isset($_GET['c']) && in_array($_GET['c'],$controllers_available)){
            if("main"==$_GET['c']){
                $controller = "main";
            }
            else {
                $controller = $_GET['c'];
            }
        }
        else {
             $controller = "main";
        }

        //function pointer to call the controller
        $this->$controller();
    }  
     
    /**
    * main controller
    * @return Call displayView() function
    */
    function main()
    {
        require_once("./controllers/main.php");
        $main = new main();
        $main->mainController();
        $this->displayView($_SESSION['view']);
    }
    
    /**
    * ad controller
    * @return Call ad controller
    */
    function ad()
    {
        require_once("./controllers/ad.php");
        $ad = new Ad();
        $ad->adController();
        $this->displayView($_SESSION['view']);
    }
    
    /**
    * rest controller
    * @return Call REST controller
    */
    function rest()
    {
        require_once("./controllers/rest.php");
        $rest = new Rest();
        $method = $this->getMethod();
        $rest->restController($method);
    }
    
    /**
    *
    * displayView renders and displays specific view
    * @param $viewname view to be displayed
    */
    function displayView($viewname)
    {
?>
        <!DOCTYPE HTML>

        <html>
            <head>
                <title>Best Site Ad</title>
                <meta name="author" 
                            content="Tung Dang, Loc Dang, Khanh Nguyen"/>
                <meta name="description" 
                            content="A site provides REST services" />
                <meta name="keywords" content="HW4, items, ad, rest, api" />
                <meta charset="utf-8" />
                <meta name="ROBOTS" content="NOINDEX, NOFOLLOW"/>
                <link rel="stylesheet" type="text/css" href="./css/styles.css"/>
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