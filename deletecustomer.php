<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>PSC-Delete Customer</title> </head>
<body>
<?php
include 'connectdb.php';
?>
<h2>DELETE A CUSTOMER</h2>
<?php

  $id= $_POST["customer"];
  $query="delete from customer where cusID='$id'";
  if (!mysqli_query($connection, $query)) {
    die("Error: delete failed" . mysqli_error($connection)); 
  }
?>
Customer was deleted successfully!
</body>
</html>
