<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>PSC-List Showings</title> </head>
<body>
<?php
include 'connectdb.php';
?>
<h2>List Showings by Genre</h2>
<form action="index3.php">
<ol>
<?php
  $genre= $_POST["genre"];


    $query = "select * from movie,genre,showing where movie.movieID=genre.movieID and genre.movieID=showing.movieID and genre='$genre' and showingID is not null";
    $result = mysqli_query($connection,$query); 
    if (!$result) {
      die("databases query failed."); 
    }

    while ($row = mysqli_fetch_assoc($result)) {
      echo '<li>';
      echo $row["showingID"].", ".$row["name"].", ".$row["year"]."<br>";
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


