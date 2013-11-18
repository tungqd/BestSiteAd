<?php
/**
* View class for landing page, which inherits from BaseView.php class
* @author Loc Dang, Tung Dang, Khanh Nguyen
*
*/

require_once("./controllers/main.php");
require_once("./config/config.php");

class SiteTestView 
{
    protected $controller;
    protected $format = FORMAT;
    function __construct()
    {    
        $this->controller = new main();
        $this->renderView();
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
    function renderView()
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
                
                <script type="text/javascript">
                    /**
                    *
                    * loadAd functions gets ad's data from proxy as XML data
                    * it then processes the XML data and displays in div id="advertisement"
                    */  
                    function loadAd()
                    {   
                        
                        var xmlhttp;
                        var x,i;
                        if (window.XMLHttpRequest)
                          {// code for IE7+, Firefox, Chrome, Opera, Safari
                          xmlhttp=new XMLHttpRequest();
                          }
                        else
                          {// code for IE6, IE5
                          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                          }
                        xmlhttp.onreadystatechange=function()
                          {
                          if (xmlhttp.readyState==4 && xmlhttp.status==200)
                            {
                            xmlDoc=xmlhttp.responseXML;
                            
                            var adID="";
                            x=xmlDoc.getElementsByTagName("adID");
                            for (i=0;i<x.length;i++)
                              {
                              adID=adID + x[i].childNodes[0].nodeValue;
                              }
                            var title="";
                            x=xmlDoc.getElementsByTagName("title");
                            for (i=0;i<x.length;i++)
                              {
                              title=title + x[i].childNodes[0].nodeValue;
                              }
                            var url="";
                            x=xmlDoc.getElementsByTagName("url");
                            for (i=0;i<x.length;i++)
                              {
                              url=url + x[i].childNodes[0].nodeValue;
                              }
                            var description="";
                            x=xmlDoc.getElementsByTagName("description");
                            for (i=0;i<x.length;i++)
                              {
                              description=description + x[i].childNodes[0].nodeValue;
                              }
                                  
                            document.getElementById("adLink").innerHTML=title;
                            document.getElementById("adLink").href='index.php?c=main&ac=adclick&adID='+adID+'&url='+url;
                            document.getElementById("description").innerHTML=description;
                            }
                          }
                        xmlhttp.open("GET","./proxy.php",true);
                        xmlhttp.send();
                       
                    }
                    
                    
                </script>
            </head>
            
            <body onload="loadAd()">
                <h1><a href="index.php"><?php echo SITENAME; ?></a></h1>
                <b class="highest">10 random news items</b><br/><br/>
                <div id="wrapper" class="siteTest">
                    <div class="tenNewsItem"> 
                            <?php
                                $tenArray = $this->displayTenNews();
                                foreach ($tenArray as $key=>$tenItems) {
                                if ($key == 1) {
                                    ?>
                                    <div id="advertisement">
                                        <a id="adLink"></a>
                                        <p id="description"></p>
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
            </body>
        </html>
    <?php
    }
}
?>


