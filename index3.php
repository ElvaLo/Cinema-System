<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>PSC-TICKET DESK</title> 
</head>
<body>
<?php
include 'connectdb.php';
?>
<h1>Welcome to PSC</h1>

<h2>Select A Customer:</h2>
<form action="selectshowing.php" method="post">
<?php
include 'getcustomer.php';
?>

<p>
<hr>
<p>

<h2>Show Customer Profile</h2>
<input type="submit" name="profile" value="View Profile">

<p>
<hr>
<p>


<h1>Buy Ticket</h1>
<h2>Select a showing:</h2>
<?php
include 'getshowing.php';
?>

<h2>Price of the ticket</h2>
Price: <input type="text" name="price"><br><br>
<input type="submit" name="buy" value="Buy Ticket">


<p>
<hr>
<p>

<h2> Rate A Movie</h2>
Would you like to rate a movie you have viewed?
<br><br>
<input type="submit" name="rate" value="Rate">


<p>
<hr>
<p>

<h2>Show Movie Titles and Ratings viewed</h2>
<input type="submit" name="titleandrating" value="Show">


<p>
<hr>
<p>

<h2>Ticket Sales by Genre</h2>
<input type="submit" name="sales" value="Show">


<p>
<hr>
<p>

<h2>Number of Movies by Genre</h2>
<input type="submit" name="number" value="Show">

<p>
<hr>
<p>


<h2>Average Rating of 4 or More Stars</h2>
<input type="submit" name="avgrating" value="Show">

<p>
<hr>
<p>


<h2>Show A List of Showing by:</h2>
Genre
<br>
<form action="getbygenre.php" method="post">
<?php
include 'getgenre.php';
?>
<input type="submit" value="Go">
</form>
<br>

Range of Date
<form action="getbydate.php" method="post">
From (yyyy-mm-dd):<input type="text" name="fromdate"><br>
To (yyyy-mm-dd):<input type="text" name="todate"><br>
<input type="submit" value="Go">
</form>
<br>

Available Theatre Room (showing ID, movie title, year of release)
<form action="index3.php">
<?php
include 'getavailabletheatreroom.php';
?>
<input type="submit" value="Go">
</form>
<br>

Movie Title
<form action="getbymovie.php" method="post">
<?php
include 'getmovie.php';
?>
<input type="submit" value="Go">
</form>

<?php
mysqli_close($connection);
?>
</body>
</html>

