<?php
    require_once('config.php');
    $host = HOST;
    $user = USERNAME;
    $pass = PASSWORD;
    $database = DATABASE;

    $db = mysqli_connect($host, $user, $pass) or die('Could not connect: ' . mysql_error());
    
    $query = "SET SQL_SAFE_UPDATES=0;";
    $query .= "DROP DATABASE IF EXISTS $database;";
    $query .= "CREATE DATABASE $database;";
    $query .= "USE $database;";
    $query .= "DROP TABLE IF EXISTS Ads;";
    $query .= "CREATE TABLE Ads (adID INT not null auto_increment,title VARCHAR(30) not null,url VARCHAR(100) not null, description VARCHAR(500) not null, PRIMARY KEY(adID));";
    $query .= "DROP TABLE IF EXISTS Counter;";
    $query .= "CREATE TABLE Counter (adID INT not null, count INT not null, PRIMARY KEY(adID));";
    
    $query .= "DROP TRIGGER IF EXISTS addCounter;";
    $query .= "CREATE TRIGGER addCounter AFTER INSERT ON Ads FOR EACH ROW INSERT INTO Counter(adID,count) VALUES (New.adID, 0);";
    //add initial data
    $query .= "INSERT INTO ads(title, url, description) VALUES ('First ad','www.somewhere1.com','First ad ever!');";
    $query .= "INSERT INTO ads(title, url, description) VALUES ('Second ad','www.somewhere2.com','Here is second ad!');";
    $query .= "INSERT INTO ads(title, url, description) VALUES ('Third ad','www.somewhere3.com','This is the third ad!');";
    $query .= "INSERT INTO Counter(adID,count) VALUES('0','0');";
    $query .= "INSERT INTO Counter(adID,count) VALUES('1','0');";
    $query .= "INSERT INTO Counter(adID,count) VALUES('2','0');";
    $query .= "INSERT INTO Counter(adID,count) VALUES('3','0');";
    if (mysqli_multi_query($db,$query)) {
        echo "Database and Schemas for $database created successfully.";
    } 
    else {
         echo "Error creating initial database $database " . mysqli_error($db);
    }
?>
