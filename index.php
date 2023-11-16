<?php
$servername = "localhost";
$username_db = "root";
$password_db = "";
$db_name = "first_db";

// Create connection
$conn = mysqli_connect($servername, $username_db, $password_db, $db_name);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Modify the SQL query to select only public data
$query = mysqli_query($conn, "SELECT * FROM list_tbl WHERE public = 'yes'");

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My first PHP Website</title>
  <meta name="author" content="Your Name">
  <meta name="description" content="Description of your website">
  <link rel="icon" href="">
  <style>
    table, th, td {
      border:1px solid black;
      text-align:center;
    }
    table { width:100%;}
  </style>
</head>
<body>
  <?php
  echo "<h2>My First PHP Website</h2>";
  ?>
  <a href="login.php"> Click here to login </a><br>
  <a href="register.php"> Click here to register </a>
  <h2 align="center">My list</h2>
  <table>
    <tr>
      <th>Id</th>
      <th>Details</th>
      <th>Post Time</th>
      <th>Edit Time</th>
    </tr>
    <?php
    while($row = mysqli_fetch_array($query)) {
      // Display only public data
      Print "<tr>";
      Print "<td>".$row['id']."</td>";
      Print "<td>".$row['details']."</td>";
      Print "<td>".$row['date_posted']." - ".$row['time_posted']."</td>";
      Print "<td>".$row['date_edited']." - ".$row['time_edited']."</td>";
      Print "</tr>";
    }
    ?>
  </table>
</body>
</html>