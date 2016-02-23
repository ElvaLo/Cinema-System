<?php
$query = "select * from theatreRoom";
$result = mysqli_query($connection,$query); 
if (!$result) {
  die("databases query failed.");
}

echo '<table border="1">';
echo '<caption><font size="5">THEATRE ROOM</font></caption>';
echo "<tr>";
echo "<th>Number</th>";
echo "<th>Capacity</th>";
echo "</tr>";

while ($row = mysqli_fetch_assoc($result)) {
  echo "<tr>";
  echo '<td>' . $row["number"] . '</td>';
  echo '<td>' . $row["capacity"] . '</td>';
  echo "</tr>";
}
echo "</table>";
mysqli_free_result($result); 
?>
