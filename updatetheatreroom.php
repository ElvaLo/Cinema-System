<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>PSC-Update Theatre Room</title> 
</head>
<body>
<?php
include 'connectdb.php';
?>
<h2>UPDATE THEATRE ROOM</h2>
<ol>
<?php
  $number= $_POST["theatreroom"];
  $capacity = $_POST["capacity"];
  $query = 'update theatreRoom set capacity="' . $capacity . '" where number="' . $number . '"'; 
  if (!mysqli_query($connection, $query)) {
    die("Error: update failed" . mysqli_error($connection)); 
  } 
  echo "Theatre room " . $number . " was updated successfully!";
  mysqli_close($connection); 
?>
</ol>
</body> 
</html>
