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

    $givenname = htmlentities ($_POST['givenname']);
    $surname = htmlentities ($_POST['surname']);
    $sn = htmlentities ($_POST['sn']);
    $rank = htmlentities ($_POST['rank']);
    $unit = htmlentities ($_POST['unit']);

    $query = "INSERT INTO member(`SN`,`rank`,`surname`,`givenname`) VALUES ('$sn','$rank','$surname','$givenname') ; INSERT INTO post(`SN`,`unit`) VALUES ('$sn', '$unit')";
    
    $result = mysqli_multi_query ($link, $query) or die(mysqli_connect_error());

    echo "<p>$rank $givenname $surname posted to $unit</p>\n";

    mysqli_close ($link);
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