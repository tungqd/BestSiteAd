<?php

    $host = "localhost";
    $user = "root";
    $pass = "";
    $database = "hw4_sitetest";

    $db = mysqli_connect($host, $user, $pass) or die('Could not connect: ' . mysql_error());

    $query = "DROP DATABASE IF EXISTS $database;";
    $query .= "CREATE DATABASE $database;";
    $query .= "USE $database;";
    $query .= "DROP TABLE IF EXISTS News;";
    $query .= "CREATE TABLE News (ID INT not null auto_increment,title VARCHAR(30) not null,content VARCHAR(200) not null, PRIMARY KEY(ID));";
    
    if (mysqli_multi_query($db,$query)) {
        echo "Database and Schemas for $database created successfully.";
    } 
    else {
         echo "Error creating initial database $database " . mysqli_error($db);
    }
?>
