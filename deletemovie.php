<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>PSC-Delete Movie</title> </head>
<body>
<?php
include 'connectdb.php';
?>
<h2>DELETE A MOVIE</h2>
<?php

  $id= $_POST["movie"];
  $query="delete from movie where movieID='$id'";
  if (!mysqli_query($connection, $query)) {
    die("Error: delete failed" . mysqli_error($connection)); 
  }
?>

</body>
</html>
