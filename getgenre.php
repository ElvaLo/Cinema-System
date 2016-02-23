<?php
  $query = "select distinct genre from genre";
  $result = mysqli_query($connection,$query); 
  if (!$result) {
    die("databases query failed."); 
  }
 
  while ($row = mysqli_fetch_assoc($result)) {
    echo '<input type="radio" name="genre" value="'; 
    echo $row["genre"];
    echo '">' . $row["genre"] . "<br>";
  }
  mysqli_free_result($result); 
?>
