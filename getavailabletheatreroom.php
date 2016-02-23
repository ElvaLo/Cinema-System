<ol>
<?php
  $query1 = "select * from showing,theatreRoom where showing.roomNum=theatreRoom.number";
  $result1 = mysqli_query($connection,$query1); 
  if (!$result1) {
    die("query1 failed."); 
  }
 
  while ($row1 = mysqli_fetch_assoc($result1)) {
    $sID=$row1["showingID"];
    $query2="select count(*) as count from ticketingInfo where showingID=$sID";
    $result2=mysqli_query($connection,$query2);
    if (!$result2) {
      die("query2 failed.");
    }
    $row2=mysqli_fetch_assoc($result2);
    $capacity=intval($row1["capacity"]);
    $count=intval($row2["count"]);
    if($capacity>$count){
      $mID=$row1["movieID"];
      $query3="select * from movie where $mID=movieID";
      $result3=mysqli_query($connection,$query3);
      if (!$result3) {
        die("query3 failed.");
      }
      $row3=mysqli_fetch_assoc($result3);
      echo "<li>";
      echo $row1["showingID"] . ", " . $row3["name"] . ", " . $row3["year"] . "<br>";
    }
  }
  mysqli_free_result($result1);
  mysqli_free_result($result2);
  mysqli_free_result($result3);

?>
</ol>
