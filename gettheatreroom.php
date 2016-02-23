<?php
  $query = "select * from theatreRoom";
  $result = mysqli_query($connection,$query); 
  if (!$result) {
    die("databases query failed."); 
  }
 
  while ($row = mysqli_fetch_assoc($result)) {
    echo '<input type="radio" name="theatreroom" value="'; 
    echo $row["number"];
    echo '">' . $row["number"] . "<br>";
  }
  mysqli_free_result($result); 
?>
