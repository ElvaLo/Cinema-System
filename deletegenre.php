<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>PSC-Delete Genre</title> </head>
<body>
<?php
include 'connectdb.php';
?>
<h2>DELETE GENRE TO A MOVIE</h2>
<?php
  $i=1;
  $j=1;
  $id= $_POST["movie"];
  $genre = $_POST["genre"];
  if(isset($_POST['genre'])){
    $query="select * from genre where movieID='$id'";
    $result=mysqli_query($connection,$query);
    if (!$result) {
      die("database query failed.");
    }
    while ($row=mysqli_fetch_assoc($result)) {
      $i=$i+1;
    }
    mysqli_free_result($result);

    $query1="delete from genre where movieID='$id' and genre='$genre'";
    if(!mysqli_query($connection,$query1)){
      die("Eroor: delete failed." . mysql_error($connection));
    }
    $query2="select * from genre where movieID='$id'";
    $result=mysqli_query($connection,$query2);
    if (!$result) {
      die("database query2 failed.");
    }
    while ($row=mysqli_fetch_assoc($result)) {
      $j=$j+1;
    }
    mysqli_free_result($result);

    if($i==$j){
      echo "The genre you selected does not exist";
    }
    else{
      echo "A genre was deleted successfully!";
    }
  }
?>

</body>
</html>
