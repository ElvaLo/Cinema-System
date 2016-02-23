<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>PSC-Update Customer</title> </head>
<body>
<?php
include 'connectdb.php';
?>
<h2>UPDATE A CUSTOMER</h2>
<ol>
<?php
  $id= $_POST["customer"];
  $fname = $_POST["fname"];
  $lname = $_POST["lname"];
  $sex = $_POST["sex"];
  $email = $_POST["email"];
  if($fname!=""){
    $query = "update customer set fname='$fname' where cusID='$id'";
    if (!mysqli_query($connection, $query)) {
      die("Error: update failed" . mysqli_error($connection)); 
    }
  } 

  if($lname!=""){
    $query1 = "update customer set lname='$lname' where cusID='$id'"; 
    if (!mysqli_query($connection, $query1)) {
      die("Error: update failed" . mysqli_error($connection)); 
    }
  } 

  if($sex!=""){
    $query2 = "update customer set sex='$sex' where cusID='$id'"; 
    if (!mysqli_query($connection, $query2)) {
      die("Error: update failed" . mysqli_error($connection)); 
    }
  }

  if($email!=""){
    $query3 = "update customer set email='$email' where cusID='$id'"; 
    if (!mysqli_query($connection, $query3)) {
      die("Error: update failed" . mysqli_error($connection)); 
    }
  }
  mysqli_close($connection); 
?>
Update Customer Successfully!
</body> 
</html>
