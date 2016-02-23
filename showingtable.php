<?php
$query = "select * from showing";
$result = mysqli_query($connection,$query); 
if (!$result) {
  die("databases query failed.");
}

echo '<table border="1">';
echo '<caption><font size="5">SHOWING</font></caption>';
echo "<tr>";
echo "<th>showing ID</th>";
echo "<th>date</th>";
echo "<th>time</th>";
echo "<th>movie ID</th>";
echo "<th>room number</th>";
echo "</tr>";

while ($row = mysqli_fetch_assoc($result)) {
  echo "<tr>";
  echo '<td>' . $row["showingID"] . '</td>';
  echo '<td>' . $row["date"] . '</td>';
  echo '<td>' . $row["time"] . '</td>';
  echo '<td>' . $row["movieID"] . '</td>';
  echo '<td>' . $row["roomNum"] . '</td>';
  echo "</tr>";
}
echo "</table>";
mysqli_free_result($result); 
?>
