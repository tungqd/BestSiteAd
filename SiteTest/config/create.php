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
    $query .= "INSERT INTO News(title,content) VALUES ('First Story', 'This is our first story');";
    $query .= "INSERT INTO News(title,content) VALUES ('Second Story', 'This is our second story');";
    $query .= "INSERT INTO News(title,content) VALUES ('Third Story', 'This is our third story');";
    $query .= "INSERT INTO News(title,content) VALUES ('Fourth Story', 'This is our fourth story');";
    $query .= "INSERT INTO News(title,content) VALUES ('Fifth Story', 'This is our fifth story');";
    $query .= "INSERT INTO News(title,content) VALUES ('Sixth Story', 'This is our sixth story');";
    $query .= "INSERT INTO News(title,content) VALUES ('Seventh Story', 'This is our seventh story');";
    $query .= "INSERT INTO News(title,content) VALUES ('Eighth Story', 'This is our eighth story');";
    $query .= "INSERT INTO News(title,content) VALUES ('Ninth Story', 'This is our ninth story');";
    $query .= "INSERT INTO News(title,content) VALUES ('Tenth Story', 'This is our tenth story');";

    if (mysqli_multi_query($db,$query)) {
        echo "Database and Schemas for $database created successfully.";
    } 
    else {
         echo "Error creating initial database $database " . mysqli_error($db);
    }
?>
