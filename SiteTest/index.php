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

class SiteTest
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
        require_once("./controllers/main.php");
        $main = new main();
        $main->mainController();
        $this->displayView($_SESSION['view']);
    }
    /**
    *
    * displayView renders and displays specific view
    * @params $viewname view to be displayed
    */
    function displayView($viewname)
    {
?>
        <!DOCTYPE HTML>

        <html>
            <head>
                <title>SiteTest</title>
                <meta name="author" content="Tung Dang, Loc Dang, Khanh Nguyen" />
                <meta name="description" content="A showcase site using REST-based advertising web service." />
                <meta name="keywords" content="HW4, ad, product" />
                <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
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
$site_obj = new SiteTest();
$site_obj -> start(); 
?>
