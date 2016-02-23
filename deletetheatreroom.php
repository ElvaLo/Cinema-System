<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>PSC-Delete Theatre Room</title> </head>
<body>
<?php
include 'connectdb.php';
?>
<h2>DELETE A THEATRE ROOM</h2>
<?php

  $num = $_POST["theatreroom"];
  $query="delete from theatreRoom where number='$num'";
  if (!mysqli_query($connection, $query)) {
    die("Error: delete failed" . mysqli_error($connection)); 
  }
?>
Theatre room was deleted successfully!
</body>
</html>
