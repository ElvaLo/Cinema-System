<?php
  $query = "select * from movie";
  $result = mysqli_query($connection,$query); 
  if (!$result) {
    die("databases query failed."); 
  }
 
  while ($row = mysqli_fetch_assoc($result)) {
    echo '<input type="radio" name="movie" value="'; 
    echo $row["movieID"];
    echo '">' . $row["name"] . "<br>";
  }
  mysqli_free_result($result); 
?>
