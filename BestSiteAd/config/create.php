<?php
    require_once('config.php');
    $host = HOST;
    $user = USERNAME;
    $pass = PASSWORD;
    $database = DATABASE;

    $db = mysqli_connect($host, $user, $pass) or die('Could not connect: ' . mysql_error());

    $query = "DROP DATABASE IF EXISTS $database;";
    $query .= "CREATE DATABASE $database;";
    $query .= "USE $database;";
    $query .= "DROP TABLE IF EXISTS ads;";
    $query .= "CREATE TABLE ads (adID INT not null auto_increment,title VARCHAR(30) not null,url VARCHAR(100) not null,description VARCHAR(500) not null);";
    $query .= "DROP TABLE IF EXISTS Counter;";
    $query .= "CREATE TABLE Counter (adID INT not null, count INT not null);";
    
    //add initial data
    $query .= "INSERT INTO ads(title, url, description) VALUES ('First ad','www.somewhere.com','First ad ever!');";
    $query .= "INSERT INTO ads(title, url, description) VALUES ('Second ad','www.somewhere2.com','Second ad!');";
    $query .= "INSERT INTO ads(title, url, description) VALUES ('Third ad','www.somewhere3.com','Third ad!');";
    if (mysqli_multi_query($db,$query)) {
        echo "Database and Schemas for $database created successfully.";
    } 
    else {
         echo "Error creating initial database $database " . mysqli_error($db);
    }
?>
