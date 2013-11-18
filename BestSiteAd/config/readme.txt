Loc Dang, Tung Dang, Khanh Nguyen

1. Please modify username and password accordingly in config.php
2. To create database for BestSiteAd, run create.php in the config foler.
3. To validate XML output against DTD, please modify the path specified in XML/ad.dtd to your corresponding path

Procedure to test MySQL Injection Attack:

http://localhost/CS174/Hw4/BestSiteAd/index.php/increment-vulnerable/?adID=1;UPDATE%20Counter%20SET%20count=1000%20WHERE%20adID=0
http://localhost/CS174/Hw4/BestSiteAd/index.php/increment-choice/?adID=1;UPDATE%20Counter%20SET%20count=1000%20WHERE%20adID=0