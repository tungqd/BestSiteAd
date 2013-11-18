Loc Dang, Tung Dang, Khanh Nguyen

There are 2 readme files, one for each site.
Please modify the PATH and sql credentials accordingly to test our sites.


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
