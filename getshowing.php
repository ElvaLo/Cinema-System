<?php
  $query = "select * from showing";
  $result = mysqli_query($connection,$query); 
  if (!$result) {
    die("databases query failed."); 
  }
 
  while ($row = mysqli_fetch_assoc($result)) {
    echo '<input type="radio" name="showing" value="'; 
    echo $row["showingID"];
    echo '">' . $row["showingID"] .  "<br>";
  }
  mysqli_free_result($result); 
?>
