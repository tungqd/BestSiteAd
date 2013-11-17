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
    $query .= "DROP TABLE IF EXISTS News;";
    $query .= "CREATE TABLE News (ID INT not null auto_increment,title VARCHAR(30) not null,content VARCHAR(200) not null,counter INT, PRIMARY KEY(ID));";
    $query .= "INSERT INTO News(title,content,counter) VALUES ('First Story', 'This is our first story','0');";
    $query .= "INSERT INTO News(title,content,counter) VALUES ('Second Story', 'This is our second story','0');";
    $query .= "INSERT INTO News(title,content,counter) VALUES ('Third Story', 'This is our third story','0');";
    $query .= "INSERT INTO News(title,content,counter) VALUES ('Fourth Story', 'This is our fourth story','0');";
    $query .= "INSERT INTO News(title,content,counter) VALUES ('Fifth Story', 'This is our fifth story','0');";
    $query .= "INSERT INTO News(title,content,counter) VALUES ('Sixth Story', 'This is our sixth story','0');";
    $query .= "INSERT INTO News(title,content,counter) VALUES ('Seventh Story', 'This is our seventh story','0');";
    $query .= "INSERT INTO News(title,content,counter) VALUES ('Eighth Story', 'This is our eighth story','0');";
    $query .= "INSERT INTO News(title,content,counter) VALUES ('Ninth Story', 'This is our ninth story','0');";
    $query .= "INSERT INTO News(title,content,counter) VALUES ('Tenth Story', 'This is our tenth story','0');";

    if (mysqli_multi_query($db,$query)) {
        echo "Database and Schemas for $database created successfully.";
    } 
    else {
         echo "Error creating initial database $database " . mysqli_error($db);
    }
?>
