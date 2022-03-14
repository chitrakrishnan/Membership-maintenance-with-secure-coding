<?php // setupdatabase.php


require_once 'connect_mysql.php';

  $connection = new mysqli(HOST, USER, PASS, DB);

  if ($connection->connect_error) 
    die("DB Connection failed. Fatal Error!");
else
    echo "DB Connection successful! <br>";
  
    $query = "Create database service_members";

  $result = $connection->query($query);
  if ($result) echo "Database created successfully!";

?>