<?php
$query = "select * from movie";
$result = mysqli_query($connection,$query); 
if (!$result) {
  die("databases query failed.");
}

echo '<table border="1">';
echo '<caption><font size="5">MOVIE</font></caption>';
echo "<tr>";
echo "<th>Movie ID</th>";
echo "<th>Movie Name</th>";
echo "<th>Year of Release</th>";
echo "</tr>";

while ($row = mysqli_fetch_assoc($result)) {
  echo "<tr>";
  echo '<td>' . $row["movieID"] . '</td>';
  echo '<td>' . $row["name"] . '</td>';
  echo '<td>' . $row["year"] . '</td>';
  echo "</tr>";
}
echo "</table>";
mysqli_free_result($result); 
?>
