<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>PSC-Delete Showing</title> </head>
<body>
<?php
include 'connectdb.php';
?>
<h2>DELETE A SHOWING</h2>
<?php

  $id= $_POST["showing"];
  $query="delete from showing where showingID='$id'";
  if (!mysqli_query($connection, $query)) {
    die("Error: delete failed" . mysqli_error($connection)); 
  }
?>
Showing was deleted successfully!
</body>
</html>
