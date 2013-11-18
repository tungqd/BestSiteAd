<?php
    DEFINE('HOST', 'localhost');
    DEFINE('USERNAME', 'root');
    DEFINE('PASSWORD', '');
    DEFINE('DATABASE', 'hw4_sitetest');
    DEFINE('SITENAME', 'SiteTest');
    
    DEFINE('PATH',"http://localhost/CS174/Hw4/BestSiteAd/index.php/");
    
    DEFINE('GETAD_URL',PATH."get-ad/?format=");
    DEFINE('INCRE_URL',PATH."increment-choice/?adID=");
    DEFINE('INCRE_VUL',PATH."increment-vulnerable/?sql=");
    DEFINE('SQL', 'update Counter set count = 1000');
    
    DEFINE('FORMAT', 'xml');
?>
