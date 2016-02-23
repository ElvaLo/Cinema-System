<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>PSC-Add Customer</title> 
</head>
<body> 
<?php
  include 'connectdb.php'; 
?>
 
<ol>
<?php
  $fname= $_POST["fname"];
  $lname= $_POST["lname"]; 
  $sex= $_POST["sex"]; 
  $email= $_POST["email"];  
  $query1= 'select max(cusID) as maxid from customer'; 
  $result=mysqli_query($connection,$query1);
  if (!$result) {
    die("database max query failed.");
  }
  $row=mysqli_fetch_assoc($result);
  $newkey = intval($row["maxid"]) + 1;
  $id = (string)$newkey;
  $query = 'insert into customer values("' . $id . '","' . $fname . '","' . $lname . '","' . $sex . '","' . $email . '")';
  if (!mysqli_query($connection, $query)) {
    die("Error: insert failed" . mysqli_error($connection)); 
  }
  echo "A new customer was added successfully!";
  mysqli_close($connection); 
?>
</ol> 
</body> 
</html>


