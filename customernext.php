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
<form action="customerupdated.php" method="post">
<ol>
<?php
  $fname= $_POST["fname"];
  $lname= $_POST["lname"];
  $sex= $_POST["sex"];
  $email= $_POST["email"];
  if($fname!=NULL){
    $query = 'update customer set fname="' . $fname . '" where ';
  }
  $query = 'insert into"' . $id . '"'; 
  $result=mysqli_query($connection,$query);
  if (!$result) {
    die("database query failed.");
  }
  
  $row=mysqli_fetch_assoc($result);
    echo $row["cusID"];
    echo 'First Name:<input type="text" name="fname"><br>';
    echo 'Last Name:<input type="text" name="lname"><br>';
    echo 'Sex:<input type="text" name="sex"><br>';
    echo 'Email:<input type="text" name="email"><br>';
  
  mysqli_free_result($result); 
?>
</ol>
<input type="submit" value="Next">
</form> 
<?php
  mysqli_close($connection); 
?>
</body> 
</html>


