<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>PSC-Add Theatre Room</title> 
</head>
<body> 
<?php
  include 'connectdb.php'; 
?>
 
<ol>
<?php
  $capacity= $_POST["capacity"]; 
  $query1= 'select max(number) as maxnum from theatreRoom'; 
  $result=mysqli_query($connection,$query1);
  if (!$result) {
    die("database max query failed.");
  }
  $row=mysqli_fetch_assoc($result);
  $newkey = intval($row["maxnum"]) + 1;
  $number = (string)$newkey;
  $query = 'insert into theatreRoom values("' . $number . '","' . $capacity . '")'; 
  if (!mysqli_query($connection, $query)) {
    die("Error: insert failed" . mysqli_error($connection)); 
  }
  echo "A new theatre room was added!";
  mysqli_close($connection); 
?>
</ol> 
</body> 
</html>
