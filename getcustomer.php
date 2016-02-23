<?php
  $query = "select * from customer";
  $result = mysqli_query($connection,$query); 
  if (!$result) {
    die("databases query failed."); 
  }
 
  while ($row = mysqli_fetch_assoc($result)) {
    echo '<input type="radio" name="customer" value="'; 
    echo $row["cusID"];
    echo '">' . $row["fname"] . " " . $row["lname"] . "<br>";
  }
  mysqli_free_result($result); 
?>
