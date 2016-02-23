<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>PSC-Update Movie</title> </head>
<body>
<?php
include 'connectdb.php';
?>
<h2>UPDATE A MOVIE</h2>
<ol>
<?php
  $id= $_POST["movie"];
  $name = $_POST["name"];
  $year = $_POST["year"];

  if($name!=""){
    $query = "update movie set name='$name' where movieID='$id'";
    if (!mysqli_query($connection, $query)) {
      die("Error: update failed" . mysqli_error($connection)); 
    }
  } 

  if($year!=""){
    $query1 = "update movie set year='$year' where movieID='$id'"; 
    if (!mysqli_query($connection, $query1)) {
      die("Error: update failed" . mysqli_error($connection)); 
    }
  }

  mysqli_close($connection); 
?>
Update Movie Successfully!
</body> 
</html>
