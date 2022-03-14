<?php // createtables.php

require_once 'connect.php';

$connection = new mysqli(HOST, USER, PASS, DB);

  $query = "CREATE TABLE member (
    SN CHAR(10) NOT NULL PRIMARY KEY,
    surname  VARCHAR(30) NULL, index(surname),
    givenname VARCHAR(20) NULL,
    rank CHAR(5) NULL
)";

$result = $connection->query($query);
if ($result) 
echo "Create table member success <br> ";
else
die("Create table member failed");

 $query = "CREATE TABLE post (
    SN CHAR(10) NOT NULL PRIMARY KEY,
    unit CHAR(30) NULL
    )";
    
    $result = $connection->query($query);
    if ($result) 
    echo "Create table post success <br> ";
    else
    die("Create table post failed");

  
 ?>