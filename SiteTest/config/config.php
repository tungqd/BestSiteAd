<?php
    DEFINE('HOST', 'localhost');
    DEFINE('USERNAME', 'root');
    DEFINE('PASSWORD', '');
    DEFINE('DATABASE', 'hw4_sitetest');
    DEFINE('SITENAME', 'SiteTest');
    
    DEFINE('PATH',"http://localhost/Hw4/BestSiteAd/index.php/");
    
    DEFINE('GETAD_URL',PATH."get-ad/?format=");
    DEFINE('INCRE_URL',PATH."increment-choice/?adID=");
    DEFINE('INCRE_VUL',PATH."increment-vulnerable/?adID=");
    DEFINE('SQL',";UPDATE Counter SET count=10000 WHERE adID=0");
    DEFINE('FORMAT', 'xml');
?>
