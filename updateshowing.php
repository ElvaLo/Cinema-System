<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>PSC-Update Showing</title> </head>
<body>
<?php
include 'connectdb.php';
?>
<h2>UPDATE A SHOWING</h2>
<ol>
<?php
  $id = $_POST["showing"];
  $date= $_POST["date"];
  $time = $_POST["time"];
  $movieID = $_POST["movieID"];
  $roomNum = $_POST["roomNum"];
  if($date!=""){
    $query = "update showing set date='$date' where showingID='$id'";
    if (!mysqli_query($connection, $query)) {
      die("Error: update failed" . mysqli_error($connection)); 
    }
  } 

  if($time!=""){
    $query1 = "update showing set time='$time' where showingID='$id'"; 
    if (!mysqli_query($connection, $query1)) {
      die("Error: update failed" . mysqli_error($connection)); 
    }
  } 

  if($movieID!=""){
    $query2 = "update showing set movieID='$movieID' where showingID='$id'"; 
    if (!mysqli_query($connection, $query2)) {
      die("Error: update failed" . mysqli_error($connection)); 
    }
  }

  if($roomNum!=""){
    $query3 = "update showing set roomNum='$roomNum' where showingID='$id'"; 
    if (!mysqli_query($connection, $query3)) {
      die("Error: update failed" . mysqli_error($connection)); 
    }
  }
  mysqli_close($connection); 
?>
Update Showing Successfully!
</body> 
</html>
