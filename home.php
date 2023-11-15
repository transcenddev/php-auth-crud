<?php
session_start(); //starts the session
if(!isset($_SESSION['user'])){ // checks if the user is logged in
  header("location: index.php"); // redirects if user is not logged in
  exit();
}
$user = $_SESSION['user']; //assigns user value
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Home Page</title>
  </head>
  <style>
    table, th, td {
      border: 1px solid black;
      text-align: center;
    }
    table {
      width: 100%;
    }
  </style>

  <body>
    <h2>Home Page</h2>
    <p> Hello <?php echo $user; ?>!</p> <!--Display's user name-->
    <a href="logout.php">Click here to go logout</a><br/><br/>

    <form action="add.php" method="POST">
      Add more to list: <input type="text" name="details" /> <br/>
      Public post? <input type="checkbox" name="public[]" value="yes" /> <br/>
      <input type="submit" value="Add to list"/>
    </form>

    <h2 align="center">My list</h2>
    <table border="1px" width="100%">
      <tr>
        <th>Id</th>
        <th>Details</th>
        <th>Post Time</th>
        <th>Edit Time</th>
        <th>Edit</th>
        <th>Delete</th>
        <th>Public Post</th>
      </tr>
      <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "first_db";

      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);

      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      $query = mysqli_query($conn, "Select * from list_tbl"); // SQL Query

      while($row = mysqli_fetch_array($query))
      {
        echo "<tr>";
          echo "<td>" . $row['id'] . "</td>";
          echo "<td>" . $row['details'] . "</td>";
          echo "<td>" . $row['date_posted'] . "-" . $row['time_posted'] . "</td>";
          echo "<td>" . $row['date_edited'] . "-" . $row['time_edited'] . "</td>";
          echo "<td><a href='edit.php?id=" . $row['id'] . "'>edit</a></td>";
          echo "<td><a href='delete.php?id=" . $row['id'] . "'>delete</a></td>";
          echo "<td>" . $row['public'] . "</td>";
        echo "</tr>";
      }     
      ?>
    </table>
  </body>
</html>