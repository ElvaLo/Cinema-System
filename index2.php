<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>PSC</title> 
</head>
<body>
<?php
include 'connectdb.php';
?>
<h1>Welcome to PSC</h1>


<?php
include 'movietable.php';
?> 
<h2>ADD A NEW MOVIE</h2>
Enter data about the movie:
<form action="addmovie.php" method="post" enctype="multipart/form-data">
New Movie's Name: <input type="text" name="name"><br>
New Movie's Year: <input type="text" name="year"><br>
<input type="file" name="file" id="file"><br>
<input type="submit" value="Add New Movie">
</form>

<h2>UPDATE A MOVIE</h2>
Choose a movie to update:
<form action="updatemovie.php" method="post">
<?php
include 'getmovie.php';
?>
<br>
  Enter the update info:<br>
  Movie Name:<input type="text" name="name"><br>
  Year of Release:<input type="text" name="year"><br>
<input type="submit" value="Update Movie">
</form>

<h2>DELETE A MOVIE</h2>
Choose a movie to delete:
<form action="deletemovie.php" method="post">
<?php
include 'getmovie.php';
?>
<input type="submit" value="Delete Movie">
</form>


<p>
<hr>
<p>

<h2>SHOW MOVIE POSTER</h2>
Choose a movie:
<form action="poster.php" method="post">
<?php
include 'getmovie.php';
?>
<input type="submit" value="Show">
</form>


<p>
<hr>
<p>


<h2>ADD A GENRE TO A MOVIE</h2>
Choose a movie:
<form action="addgenre.php" method="post">
<?php
include 'getmovie.php';
?>
<br>
<label>Add genre to the movie:</label><br>
<select name="genre">
<option value="Action">Action</option>
<option value="SciFi">SciFi</option>
<option value="Animated">Animated</option>
<option value="Romance">Romance</option>
<option value="Drama">Drama</option>
<option value="Comedy">Comedy</option>
<option value="Adventure">Adventure</option>
<option value="Thriller">Thriller</option>
</select><br>
<input type="submit" value="Add New Genre">
</form>

<h2>DELETE A GENRE</h2>
Choose a movie:
<form action="deletegenre.php" method="post">
<?php
include 'getmovie.php';
?>
<br>
<label>Delete genre to the movie:</label><br>
<select name="genre">
<option value="Action">Action</option>
<option value="SciFi">SciFi</option>
<option value="Animated">Animated</option>
<option value="Romance">Romance</option>
<option value="Drama">Drama</option>
<option value="Comedy">Comedy</option>
<option value="Adventure">Adventure</option>
<option value="Thriller">Thriller</option>
</select><br>
<input type="submit" value="Delete Genre">
</form>


<p>
<hr>
<p>


<?php
include 'theatreroomtable.php';
?>
<h2>ADD A NEW THEATRE ROOM</h2>
Enter data about the theatre room:
<form action="addtheatreroom.php" method="post">
New Theatre Room's Capacity: <input type="text" name="capacity"><br>
<input type="submit" value="Add New Theatre Room">
</form>

<h2>UPDATE A THEATRE ROOM</h2>
Choose a theatre room to update:
<form action="updatetheatreroom.php" method="post">
<?php
include 'gettheatreroom.php';
?>
New CAPACITY: <input type="text" name="capacity"><br>
<input type="submit" value="Update Theatre Room">
</form>

<h2>DELETE A THEATRE ROOM</h2>
Choose a theatre room to delete:
<form action="deletetheatreroom.php" method="post">
<?php
include 'gettheatreroom.php';
?>
<input type="submit" value="Delete Theatre Room">
</form>


<p>
<hr>
<p>


<?php
include 'customertable.php';
?> 
<h2>ADD A NEW CUSTOMER</h2>
Enter data about the customer:
<form action="addcustomer.php" method="post">
New Customer's First Name: <input type="text" name="fname"><br>
New Customer's Last Name: <input type="text" name="lname"><br>
New Customer's Sex: <input type="text" name="sex"><br>
New Customer's Email: <input type="text" name="email"><br>
<input type="submit" value="Add New Customer">
</form>

<h2>UPDATE A CUSTOMER</h2>
Choose a customer to update:
<form action="updatecustomer.php" method="post">
<?php
include 'getcustomer.php';
?>
<br>
  Enter the update info:<br>
  First Name:<input type="text" name="fname"><br>
  Last Name:<input type="text" name="lname"><br>
  Sex:<input type="text" name="sex"><br>
  Email:<input type="text" name="email"><br>
  <input type="submit" value="Update Customer"><br>
</form>

<h2>DELETE A CUSTOMER</h2>
Choose a customer to delete:
<form action="deletecustomer.php" method="post">
<?php
include 'getcustomer.php';
?>
<input type="submit" value="Delete Customer">
</form>


<p>
<hr>
<p>
<?php
include 'showingtable.php';
?> 
<h2>ADD A NEW SHOWING</h2>
Enter data about the showing:
<form action="addshowing.php" method="post">
New Showing's Date (yyyy-mm-dd): <input type="text" name="date"><br>
New Showing's Time (hh:mm:ss): <input type="text" name="time"><br>
New Showing's Movie ID: <input type="text" name="movieID"><br>
New Showing's Theatre Room: <input type="text" name="roomNum"><br>
<input type="submit" value="Add New Showing">
</form>

<h2>UPDATE A SHOWING</h2>
Choose a showing to update:
<form action="updateshowing.php" method="post">
<?php
include 'getshowing.php';
?>
<br>
  Enter the update info:<br>
  Showing Date:<input type="text" name="date"><br>
  Showing Time:<input type="text" name="time"><br>
  Movie ID:<input type="text" name="movieID"><br>
  Room Number:<input type="text" name="roomNum"><br>
<input type="submit" value="Update Showing">
</form>

<h2>DELETE A SHOWING</h2>
Choose a showing to delete:
<form action="deleteshowing.php" method="post">
<?php
include 'getshowing.php';
?>
<input type="submit" value="Delete Showing">
</form>


<?php
mysqli_close($connection);
?>
</body>
</html>
