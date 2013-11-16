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
    $query .= "CREATE TABLE ads (adID INT not null,title VARCHAR(30) not null,url VARCHAR(100) not null,description VARCHAR(500) not null);";
    $query .= "DROP TABLE IF EXISTS Counter;";
    $query .= "CREATE TABLE Counter (adID INT not null, count INT not null);";
    
    if (mysqli_multi_query($db,$query)) {
        echo "Database and Schemas for $database created successfully.";
    } 
    else {
         echo "Error creating initial database $database " . mysqli_error($db);
    }
?>
