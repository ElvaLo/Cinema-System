<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>PSC-Rate A Movie</title> </head>
<body>
<?php
include 'connectdb.php';
?>
<h2>RATE A MOVIE</h2>
<?php

  $showingID= $_POST["showing"];
  $rating = $_POST["rating"];
  $query="update ticketingInfo set rating='$rating' where showingID='$showingID'";
  if (!mysqli_query($connection, $query)) {
    die("Error: update rating  failed" . mysqli_error($connection)); 
  }
?>
Thank you for your rating!
</body>
</html>
