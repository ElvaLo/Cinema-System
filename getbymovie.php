<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>PSC-List Showings</title> </head>
<body>
<?php
include 'connectdb.php';
?>
<h2>List Showings by Movie Title</h2>
<form action="index3.php">
<ol>
<?php
  $movieID= $_POST["movie"];


    $query = "select * from movie,showing where movie.movieID=showing.movieID and movie.movieID='$movieID'";
    $result = mysqli_query($connection,$query); 
    if (!$result) {
      die("databases query failed."); 
    }

    while ($row = mysqli_fetch_assoc($result)) {
      echo '<li>';
      echo $row["showingID"].", ".$row["name"].", ".$row["year"]."<br>";
      echo '<img src="' . $row["picture"] . '" height="360" width="240">';
    }
  mysqli_free_result($result);
?>
</ol>
<?php
  mysqli_close($connection); 
?>
<input type="submit" value="Back">
</form>
</body> 
</html>
