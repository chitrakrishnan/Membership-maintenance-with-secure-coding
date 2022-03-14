<!DOCTYPE html>
<html>
<head>
  <title>Posting</title>
</head>
<body>

<?php
 require 'connect.php';

 if (isset ($_POST['rank'])) {
    $link = mysqli_connect (HOST, USER, PASS, DB) or die (mysqli_connect_error());

    // if user inputs more than defined column width take the max substring value 
    $givenname = test_input(htmlentities ($_POST['givenname']));
    $givenname=substr($givenname,0,20);

    $surname = test_input(htmlentities ($_POST['surname']));
    $surname=substr($surname,0,30);

    $sn = test_input(htmlentities ($_POST['sn']));
    $sn=substr($sn,0,10);

    $rank = test_input(htmlentities ($_POST['rank']));
    $rank=substr($rank,0,5);

    $unit =test_input(htmlentities ($_POST['unit']));
    $unit=substr($unit,0,30);

    //using variables makes the code vulnerable. So we must change this to a prepared statement which will ensure user generated data is not accepted as code
//  $query = "INSERT INTO member(`SN`,`rank`,`surname`,`givenname`) VALUES ('$sn','$rank','$surname','$givenname') ; INSERT INTO post(`SN`,`unit`) VALUES ('$sn', '$unit')";

// Prepared statement for member table  
    $member_prepared_statement = $link->prepare("INSERT INTO member(SN,rank,surname,givenname) VALUES (?,?,?,?)");

//The bind function takes the parameters to the SQL query and tells the database what the parameters are. 
    $member_prepared_statement->bind_param('ssss',$sn, $rank,$surname,$givenname);
    $member_prepared_statement->execute();
    
 // prepared statement for post table 
    $post_prepared_statement = $link->prepare("INSERT INTO post(SN,unit) VALUES (?, ?)");
  
//The bind function takes the parameters to the SQL query and tells the database what the parameters are. 
    $post_prepared_statement->bind_param('ss',$sn,$unit);
    $result=$post_prepared_statement->execute();

    echo "<p>$rank $givenname $surname posted to $unit</p>\n";

// close the prepared statements and connection.
    $member_prepared_statement->close();
    $post_prepared_statement->close();
    mysqli_close ($link);
 }
//sanitization of the data
 function test_input($data) 
 {
  $data = trim($data);
  $data = strip_tags($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data = htmlentities($data);

  return $data;
 }
?>
<pre>
<form method="post" action="">
 Given Name: <input type="text" name="givenname"><br>
 Family Name: <input type="text" name="surname"><br>
 Service Number: <input type="text" name="sn"><br>
 NATO Rank Code: <input type="text" name="rank"><br>
 Unit: <input type="text" name="unit"><br>
 <input type="submit">
</pre>
</form>

</body>
</html>