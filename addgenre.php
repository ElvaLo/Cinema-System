<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>PSC-Add Genre</title> </head>
<body>
<?php
include 'connectdb.php';
?>
<h2>ADD GENRE TO A MOVIE</h2>
<ol>
<?php
  $id= $_POST["movie"];
  $genre = $_POST["genre"];
  if(isset($_POST['genre'])){
    $query='insert into genre values("' . $id . '","' . $genre . '")';
    if(!mysqli_query($connection,$query)){
      die("Eroor: insert failed" . mysql_error($connection));
    }
  }
?>
A genre was added successfully!
</body>
</html>
