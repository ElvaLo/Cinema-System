<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>PSC-Show Movie Poster</title> </head>
<body>
<?php
include 'connectdb.php';
?>
<h2>Show Movie Poster</h2>
<ol>
<?php
  $id= $_POST["movie"];
 
    $query="select * from movie where movieID='$id'";
    $result=mysqli_query($connection,$query);
    if(!$result){
      die("Eroor: queryfailed" . mysql_error($connection));
    }
   $row=mysqli_fetch_assoc($result);
  echo '<img src="' . $row["picture"] . '" height="360" width="240">';
?>
</body>
</html>


