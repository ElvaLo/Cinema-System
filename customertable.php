<?php
$query = "select * from customer";
$result = mysqli_query($connection,$query); 
if (!$result) {
  die("databases query failed.");
}

echo '<table border="1">';
echo '<caption><font size="5">CUSTOMER</font></caption>';
echo "<tr>";
echo "<th>customer ID</th>";
echo "<th>first name</th>";
echo "<th>last name</th>";
echo "<th>sex</th>";
echo "<th>email</th>";
echo "</tr>";

while ($row = mysqli_fetch_assoc($result)) {
  echo "<tr>";
  echo '<td>' . $row["cusID"] . '</td>';
  echo '<td>' . $row["fname"] . '</td>';
  echo '<td>' . $row["lname"] . '</td>';
  echo '<td>' . $row["sex"] . '</td>';
  echo '<td>' . $row["email"] . '</td>';
  echo "</tr>";
}
echo "</table>";
mysqli_free_result($result); 
?>
