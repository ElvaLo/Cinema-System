<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>PSC-TICKET DESK</title> </head>
<body>
<?php
include 'connectdb.php';
?>
<h2>Welcome!</h2>
<ol>
<?php
  $cusID= $_POST["customer"];
  $showingID = $_POST["showing"];
  $price = $_POST["price"];


if(isset($_POST['profile'])){
   if($cusID==""){
    echo "Failed. Please select a customer."."<br>";
    echo "Please try agian.";
    exit();
  }

  echo "<h2>Customer Information</h2>";

  $query="select * from customer where customer.cusID='$cusID'";
  $result=mysqli_query($connection,$query);
  if (!$result) {
    die("database query failed.");
  }
  $row=mysqli_fetch_assoc($result);

  echo "Customer ID: ".$row["cusID"]."<br>";
  echo "First Name: ".$row["fname"]."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"."Last Name: ".$row["lname"]."<br>";
  echo "Sex: ".$row["sex"]."<br>";
  echo "Email Address: ".$row["email"]."<br>";

  mysqli_free_result($result); 
}



if(isset($_POST['buy'])){
   if($cusID==""){
    echo "Failed. Please select a customer."."<br>";
    echo "Please try agian.";
    exit();
  }

  echo "<h2>Purchase a Ticket</h2>";

  if($showingID==""){
    echo "Failed. Please select a showing."."<br>";
    echo "Please try agian.";
    exit();
  }

  if($price==""){
    echo "Failed. You forgot to pick a price."."<br>";
    echo "Please try agian.";
    exit();
  }

    $query = "insert into ticketingInfo values('$cusID','$showingID','$price',null)";
    if (!mysqli_query($connection, $query)) {
      die("Error: inssert failed" . mysqli_error($connection)); 
    }

    echo "You have purchased the ticket!";
}



if(isset($_POST['rate'])){
  echo '<form action="rate.php" method="post">';
  if($cusID==""){
    echo "Failed. Please select a customer."."<br>";
    echo "Please try agian.";
    exit();
  }

  $query="select * from customer,ticketingInfo where customer.cusID=ticketingInfo.cusID and customer.cusID=$cusID and rating is null";
  $result=mysqli_query($connection,$query);
  if (!$result) {
    die("database query failed.");
  }

    echo "Select a movie to rate:"."<br>";

  while ($row=mysqli_fetch_assoc($result)) {
    $showingID=$row["showingID"];
    $query1="select * from showing,movie where movie.movieID=showing.movieID and '$showingID'=showingID";
    $result1=mysqli_query($connection,$query1);
    if (!$result1) {
      die("query1 failed.");
    }
    $row1=mysqli_fetch_assoc($result1);

    echo '<input type="radio" name="showing" value="'; 
    echo $row1["showingID"];
    echo '">' . $row["showingID"] . ", " . $row1["name"] . "<br>";
  }
  if($result1){
    mysqli_free_result($result1);
    echo "<br>Give a rating:";
    echo '<input type="text" name="rating"><br>';
  }
  else{
    echo "<br>"."Oops, you don't have a movie to rate";
    exit();
  }

  mysqli_free_result($result); 
 
  echo '<input type="submit" value="Rate">';
  echo "</form>";
}



if(isset($_POST['titleandrating'])){
   if($cusID==""){
    echo "Failed. Please select a customer."."<br>";
    echo "Please try agian.";
    exit();
  }

  $query = "select * from movie,ticketingInfo,showing where ticketingInfo.showingID=showing.showingID and showing.movieID=movie.movieID and cusID='$cusID'";
  $result = mysqli_query($connection,$query); 
  if (!$result) {
    die("databases query failed.");
  }

  echo '<table border="1">';
  echo '<caption><font size="5">MOVIES AND RATINGS</font></caption>';
  echo "<tr>";
  echo "<th>Movie Title</th>";
  echo "<th>Rating</th>";
  echo "</tr>";

  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo '<td>' . $row["name"] . '</td>';
    echo '<td>' . $row["rating"] . '</td>';
    echo "</tr>";
  }
  echo "</table>";
  mysqli_free_result($result); 

}



if(isset($_POST['sales'])){
  echo "<h2>Ticket Sales by Genre</h2>";
  echo '<table border="1">';
  echo "<tr>";
  echo "<th>Genre</th>";
  echo "<th>Total Sales</th>";
  echo "</tr>";
  
  $query = 'select * from genre,ticketingInfo,showing where genre.movieID=showing.movieID and ticketingInfo.showingID=showing.showingID and genre="Action"';
  $result = mysqli_query($connection,$query); 
  if (!$result) {
    die("databases query failed.");
  }
  $sum=0;
  while ($row=mysqli_fetch_assoc($result)) {
    $price = intval($row["price"]);
    $sum = $sum + $price;
  }
  echo "<tr>";
  echo "<td>Action</td>";
  echo "<td>" . "$sum" . "</td>";
  echo "</tr>";

  $query1 = 'select * from genre,ticketingInfo,showing where genre.movieID=showing.movieID and ticketingInfo.showingID=showing.showingID and genre="Animated"';
  $result1 = mysqli_query($connection,$query1); 
  if (!$result1) {
    die("databases query1 failed.");
  }
  $sum=0;
  while ($row1=mysqli_fetch_assoc($result1)) {
    $price = intval($row1["price"]);
    $sum = $sum + $price;
  }
  echo "<tr>";
  echo "<td>Animated</td>";
  echo "<td>" . "$sum" . "</td>";
  echo "</tr>";

  $query2 = 'select * from genre,ticketingInfo,showing where genre.movieID=showing.movieID and ticketingInfo.showingID=showing.showingID and genre="SciFi"';
  $result2 = mysqli_query($connection,$query2); 
  if (!$result2) {
    die("databases query2 failed.");
  }
  $sum=0;
  while ($row2=mysqli_fetch_assoc($result2)) {
    $price = intval($row2["price"]);
    $sum = $sum + $price;
  }  
  echo "<tr>";
  echo "<td>SciFi</td>";
  echo "<td>" . "$sum" . "</td>";
  echo "</tr>";

  $query3 = 'select * from genre,ticketingInfo,showing where genre.movieID=showing.movieID and ticketingInfo.showingID=showing.showingID and genre="Romance"';
  $result3 = mysqli_query($connection,$query3); 
  if (!$result3) {
    die("databases query3 failed.");
  }
  $sum=0;
  while ($row3=mysqli_fetch_assoc($result3)) {
    $price = intval($row3["price"]);
    $sum = $sum + $price;
  }  
  echo "<tr>";
  echo "<td>Romance</td>";
  echo "<td>" . "$sum" . "</td>";
  echo "</tr>";

  $query4 = 'select * from genre,ticketingInfo,showing where genre.movieID=showing.movieID and ticketingInfo.showingID=showing.showingID and genre="Drama"';
  $result4 = mysqli_query($connection,$query4); 
  if (!$result4) {
    die("databases query4 failed.");
  }
  $sum=0;
  while ($row4=mysqli_fetch_assoc($result4)) {
    $price = intval($row4["price"]);
    $sum = $sum + $price;
  }  
  echo "<tr>";
  echo "<td>Drama</td>";
  echo "<td>" . "$sum" . "</td>";
  echo "</tr>";

  $query5 = 'select * from genre,ticketingInfo,showing where genre.movieID=showing.movieID and ticketingInfo.showingID=showing.showingID and genre="Comedy"';
  $result5 = mysqli_query($connection,$query5); 
  if (!$result5) {
    die("databases query5 failed.");
  }
  $sum=0;
  while ($row5=mysqli_fetch_assoc($result5)) {
    $price = intval($row5["price"]);
    $sum = $sum + $price;
  }  
  echo "<tr>";
  echo "<td>Comedy</td>";
  echo "<td>" . "$sum" . "</td>";
  echo "</tr>";

  $query6 = 'select * from genre,ticketingInfo,showing where genre.movieID=showing.movieID and ticketingInfo.showingID=showing.showingID and genre="Adventure"';
  $result6 = mysqli_query($connection,$query6); 
  if (!$result6) {
    die("databases query6 failed.");
  }
  $sum=0;
  while ($row6=mysqli_fetch_assoc($result6)) {
    $price = intval($row6["price"]);
    $sum = $sum + $price;
  }  
  echo "<tr>";
  echo "<td>Adventure</td>";
  echo "<td>" . "$sum" . "</td>";
  echo "</tr>";

  $query7 = 'select * from genre,ticketingInfo,showing where genre.movieID=showing.movieID and ticketingInfo.showingID=showing.showingID and genre="Thriller"';
  $result7 = mysqli_query($connection,$query7); 
  if (!$result7) {
    die("databases query7 failed.");
  }
  $sum=0;
  while ($row7=mysqli_fetch_assoc($result7)) {
    $price = intval($row7["price"]);
    $sum = $sum + $price;
  }  
  echo "<tr>";
  echo "<td>Thriller</td>";
  echo "<td>" . "$sum" . "</td>";
  echo "</tr>";
  echo "</table>";


  mysqli_free_result($result); 
  mysqli_free_result($result1); 
  mysqli_free_result($result2); 
  mysqli_free_result($result3); 
  mysqli_free_result($result4); 
  mysqli_free_result($result5); 
  mysqli_free_result($result6); 
  mysqli_free_result($result7); 
}


if(isset($_POST['number'])){
  echo "<h2>Number of Movies by Genre</h2>";
  echo '<table border="1">';
  echo "<tr>";
  echo "<th>Genre</th>";
  echo "<th>Number of Movies</th>";
  echo "</tr>";
  
  $query = 'select count(distinct movieID) as count from genre where genre="Action"';
  $result = mysqli_query($connection,$query); 
  if (!$result) {
    die("databases query failed.");
  }
  $row=mysqli_fetch_assoc($result);
  echo "<tr>";
  echo "<td>Action</td>";
  echo "<td>" . $row["count"] . "</td>";
  echo "</tr>";

  $query1 = 'select count(distinct movieID) as count from genre where genre="Animated"';
  $result1 = mysqli_query($connection,$query1); 
  if (!$result1) {
    die("databases query1 failed.");
  }
  $row1=mysqli_fetch_assoc($result1);
  echo "<tr>";
  echo "<td>Animated</td>";
  echo "<td>" . $row1["count"] . "</td>";
  echo "</tr>";

  $query2 = 'select count(distinct movieID) as count from genre where genre="SciFi"';
  $result2 = mysqli_query($connection,$query2); 
  if (!$result2) {
    die("databases query2 failed.");
  }
  $row2=mysqli_fetch_assoc($result2);
  echo "<tr>";
  echo "<td>SciFi</td>";
  echo "<td>" . $row2["count"] . "</td>";
  echo "</tr>";

  $query3 = 'select count(distinct movieID) as count from genre where genre="Romance"';
  $result3 = mysqli_query($connection,$query3); 
  if (!$result3) {
    die("databases query3 failed.");
  }
  $row3=mysqli_fetch_assoc($result3);
  echo "<tr>";
  echo "<td>Romance</td>";
  echo "<td>" . $row3["count"] . "</td>";
  echo "</tr>";

  $query4 = 'select count(distinct movieID) as count from genre where genre="Drama"';
  $result4 = mysqli_query($connection,$query4); 
  if (!$result4) {
    die("databases query4 failed.");
  }
  $row4=mysqli_fetch_assoc($result4);
  echo "<tr>";
  echo "<td>Drama</td>";
  echo "<td>" . $row4["count"] . "</td>";
  echo "</tr>";

  $query5 = 'select count(distinct movieID) as count from genre where genre="Comedy"';
  $result5 = mysqli_query($connection,$query5); 
  if (!$result5) {
    die("databases query5 failed.");
  }
  $row5=mysqli_fetch_assoc($result5);
  echo "<tr>";
  echo "<td>Comedy</td>";
  echo "<td>" . $row5["count"] . "</td>";
  echo "</tr>";

  $query6 = 'select count(distinct movieID) as count from genre where genre="Adventure"';
  $result6 = mysqli_query($connection,$query6); 
  if (!$result6) {
    die("databases query6 failed.");
  }
  $row6=mysqli_fetch_assoc($result6);
  echo "<tr>";
  echo "<td>Adventure</td>";
  echo "<td>" . $row6["count"] . "</td>";
  echo "</tr>";

  $query7 = 'select count(distinct movieID) as count from genre where genre="Thriller"';
  $result7 = mysqli_query($connection,$query7); 
  if (!$result7) {
    die("databases query7 failed.");
  }
  $row7=mysqli_fetch_assoc($result7);
  echo "<tr>";
  echo "<td>Thriller</td>";
  echo "<td>" . $row7["count"] . "</td>";
  echo "</tr>";
  echo "</table>";

  mysqli_free_result($result); 
  mysqli_free_result($result1);
  mysqli_free_result($result2);
  mysqli_free_result($result3);
  mysqli_free_result($result4);
  mysqli_free_result($result5);
  mysqli_free_result($result6);
  mysqli_free_result($result7);
}


if(isset($_POST['avgrating'])){
  echo "<h2>Average Rating of Movies</h2>";
  echo '<table border="1">';
  echo "<tr>";
  echo "<th>Movie</th>";
  echo "<th>Average Rating</th>";
  echo "</tr>";

  $query = "select name,avg(rating) as rating from movie,ticketingInfo,showing where showing.showingID=ticketingInfo.showingID and showing.movieID=movie.movieID and rating is not null group by movie.movieID";
  $result = mysqli_query($connection,$query); 
  if (!$result) {
    die("databases query failed.");
  }

  while ($row=mysqli_fetch_assoc($result)) {
    $avg=$row["rating"];
    if($avg>=4){
      echo "<tr>";
      echo '<td>' . $row["name"] . '</td>';
      echo '<td>' . $row["rating"] . '</td>';
      echo "</tr>";
    }
  }
  echo "</table>";
  mysqli_free_result($result); 
}
 mysqli_close($connection); 
?>


</body> 
</html>


