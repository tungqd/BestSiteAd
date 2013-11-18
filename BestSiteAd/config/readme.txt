Loc Dang, Tung Dang, Khanh Nguyen

1. Please modify username and password accordingly in config.php
2. To create database for BestSiteAd, run create.php in the config folder.
3. To validate XML output against DTD, please save the xml output from get-ad method to an XML file and put it in the XML folder.
    We also include a sampleAd.xml in the folder.
4. To validate the xml/json output for get-ad method, please go to the following link:
        JSON: http://localhost/Hw4/BestSiteAd/index.php/get-ad/?format=json
        XML:  http://localhost/Hw4/BestSiteAd/index.php/get-ad/?format=xml


Procedure to test MySQL Injection Attack:

There are two methods to demonstrate the MySQL injection attack:
Method 1:
From BestSiteAd, go to the following url:
    Increment-vulnerable: http://localhost/Hw4/BestSiteAd/index.php/increment-vulnerable/?adID=1;UPDATE%20Counter%20SET%20count=10000%20WHERE%20adID=0
        The counter for adid=0 will be changed to 10000 as a result of the attack.
    Increment-choice: http://localhost/Hw4/BestSiteAd/index.php/increment-choice/?adID=1;UPDATE%20Counter%20SET%20count=10000%20WHERE%20adID=0
        The counter for adid=0 stays the same because increment-choice stops the injection before executing the query
Method 2:
We implement the "Injection attack" button in SiteTest to demonstrate the vulnerability of increment-vulnerable.
The result will be the same as issuing increment-vulnerable from BestSiteAd in method 1.
