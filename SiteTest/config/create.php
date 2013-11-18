<?php
    require_once('config.php');
    
    $host = HOST;
    $user = USERNAME;
    $pass = PASSWORD;
    $database = DATABASE;

    $db = mysqli_connect($host, $user, $pass) 
            or die('Could not connect: ' . mysql_error());

    $query = "DROP DATABASE IF EXISTS $database;";
    $query .= "CREATE DATABASE $database;";
    $query .= "USE $database;";
    $query .= "DROP TABLE IF EXISTS News;";
    $query .= "CREATE TABLE News (ID INT not null auto_increment,
                    title VARCHAR(30) not null, url VARCHAR(150) not null, 
                    content VARCHAR(300) not null, PRIMARY KEY(ID));";
    $query .= "INSERT INTO News(title,url,content) VALUES ('Yoga Tablet', 
        'http://www.engadget.com/2013/11/17/the-yoga-tablet-does-kickstands-with-a-twist/',
        'If one takes a narrow view of the tablet market.');";
    $query .= "INSERT INTO News(title,url,content) VALUES ('Kindle Fire OS', 
    'http://www.engadget.com/2013/11/18/kindle-goodreads-hands-on/',
    'Goodreads on Kindle Fire OS.');";
    $query .= "INSERT INTO News(title,url,content) VALUES ('Tablo', 
                'http://www.engadget.com/2013/11/16/tablo-hands-on/',
                'a DVR that streams over-the-air TV nearly anywhere');";
    $query .= "INSERT INTO News(title,url,content) VALUES ('Quantum Computing', 
    'http://www.engadget.com/2013/11/16/oxford-university-scientists-break-qubit-survival-record-are-on/',
    'Experiment brings quantum computing a step closer to reality');";
    $query .= "INSERT INTO News(title,url,content) VALUES ('Twitter', 
    'http://www.engadget.com/2013/11/16/twitter-alpha-beta-android-app-design/',
    'Twitter scraps Android app redesign previewed to testers');";
    $query .= "INSERT INTO News(title,url,content) VALUES ('LG Flex', 
    'http://www.engadget.com/2013/11/15/lg-g-flex-att-lte/',
    'LG G Flex appears on the FCC with ATT-friendly LTE');";
    $query .= "INSERT INTO News(title,url,content) VALUES ('London', 
    'http://www.engadget.com/2013/11/15/london-city-tld/',
    'London becomes the latest city to get its own top-level domain');";
    $query .= "INSERT INTO News(title,url,content) VALUES ('Adobe Reader', 
    'http://www.engadget.com/2013/11/15/adobe-reader-pdf-conversion-android/', 
    'Update for Android adds costly PDF conversion features');";
    $query .= "INSERT INTO News(title,url,content) VALUES ('Galaxy Gear', 
    'http://www.engadget.com/2013/11/15/almost-all-of-your-notifications-can-now-display-on-galaxy-gear/',
    'Almost all of your notifications can now 
    display.');";
    $query .= "INSERT INTO News(title,url,content) VALUES ('Microsoft', 
    'http://www.engadget.com/2013/11/15/steve-ballmer-explains-retirement-decision/',
    'Steve Ballmer couldnt change Microsoft fast enough');";

    if (mysqli_multi_query($db,$query)) {
        echo "Database and Schemas for $database created successfully.";
    } 
    else {
         echo "Error creating initial database $database " . mysqli_error($db);
    }
?>