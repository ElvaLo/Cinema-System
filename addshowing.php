<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>PSC-Add Showing</title> 
</head>
<body> 
<?php
  include 'connectdb.php'; 
?>
 
<ol>
<?php
  $date= $_POST["date"];
  $time= $_POST["time"]; 
  $movieID= $_POST["movieID"]; 
  $roomNum= $_POST["roomNum"];  
  $query1= 'select max(showingID) as maxid from showing'; 
  $result=mysqli_query($connection,$query1);
  if (!$result) {
    die("database max query failed.");
  }
  $row=mysqli_fetch_assoc($result);
  $newkey = intval($row["maxid"]) + 1;
  $id = (string)$newkey;
  $query = 'insert into showing values("' . $id . '","' . $date . '","' . $time . '","' . $movieID . '","' . $roomNum . '")';
  if (!mysqli_query($connection, $query)) {
    die("Error: insert failed" . mysqli_error($connection)); 
  }
  echo "A new showing was added successfully!";
  mysqli_close($connection); 
?>
</ol> 
</body> 
</html>
