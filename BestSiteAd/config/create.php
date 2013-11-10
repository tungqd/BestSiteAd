<?php

    $host = "localhost";
    $user = "root";
    $pass = "";
    $database = "hw3";

    $db = mysqli_connect($host, $user, $pass) or die('Could not connect: ' . mysql_error());

    $query = "DROP DATABASE IF EXISTS $database;";
    $query .= "CREATE DATABASE $database;";
    $query .= "USE $database;";
    $query .= "DROP TABLE IF EXISTS Poem;";
    $query .= "CREATE TABLE Poem (ID INT not null auto_increment,title VARCHAR(30) not null,author VARCHAR(30) not null,content VARCHAR(200) not null,
        timeSelected DATETIME,PRIMARY KEY(ID));";
    $query .= "DROP TABLE IF EXISTS Rating;";
    $query .= "CREATE TABLE Rating (ID INT not null auto_increment, pID INT not null, rating INT not null, PRIMARY KEY(ID),
        FOREIGN KEY(pID) REFERENCES Poem(ID) ON UPDATE CASCADE);";
    $query .= "DROP TABLE IF EXISTS TimePicked;";
    $query .= "CREATE TABLE TimePicked (poemID INT not null, time DATETIME not null, PRIMARY KEY(poemID));"; 
    $query .= "INSERT INTO TimePicked values (1, NOW());";
    $query .= "INSERT INTO Poem(title, author,content, timeSelected) VALUES ('INITIAL POEM', 'First Person','There was an old man from Peru\n who dreamed he was eating his shoe\n He awoke in the night\n with a terrible fright\n and found out that it was quite true.', NOW());";
    $query .= "INSERT INTO Poem(title, author,content, timeSelected) VALUES ('SECOND POEM', 'Second Person','aa\n aa\n bb\n bb\n aa', (NOW() + 1));";

    if (mysqli_multi_query($db,$query)) {
        echo "Database and Schemas for $database created successfully.";
    } 
    else {
         echo "Error creating initial database $database " . mysqli_error($db);
    }
?>
