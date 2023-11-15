<?php
session_start(); //starts the session

if ($_SERVER['REQUEST_METHOD'] == "POST") {
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

  $details = mysqli_real_escape_string($conn, $_POST['details']);
  $public = "no";
  $id = $_SESSION['id'];
  $time = strftime("%X"); //time
  $date = strftime("%B %d, %Y"); //date

  foreach ($_POST['public'] as $list) {
    if ($list != null) {
      $public = "yes";
    }
  }

  mysqli_query($conn, "UPDATE list_tbl SET details='$details', public='$public', date_edited='$date', time_edited='$time' WHERE id='$id'");
  header("location: home.php");
}

?>

<!DOCTYPE html>
<html>

<head>
  <title>My first PHP website</title>
  <style>
    table,
    th,
    td {
      border: 1px solid black;
      text-align: center;
    }

    table {
      width: 100%;
    }
  </style>
</head>

<body>
  <h2>Home Page</h2>
  <?php
  if (!isset($_SESSION['user'])) {
    header("location:index.php"); // redirects if user is not logged in
  }
  $user = $_SESSION['user']; //assigns user value
  ?>
  <p>Hello <?php echo $user ?>!</p> <!--Displays user's name-->
  <a href="logout.php">Click here to logout</a><br /><br />
  <a href="home.php">Return to Home page</a>
  <h2 style="text-align:center">Currently Selected</h2>
  <table>
    <tr>
      <th>Id</th>
      <th>Details</th>
      <th>Post Time</th>
      <th>Edit Time</th>
      <th>Public Post</th>
    </tr>
    <?php
    if (!empty($_GET['id'])) {
      $id = $_GET['id'];
      $_SESSION['id'] = $id;
      $servername = "localhost";
      $username_db = "root";
      $password_db = "";
      $db_name = "first_db";

      // Create connection
      $conn = mysqli_connect($servername, $username_db, $password_db, $db_name);

      // Check the connection
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }

      $query = mysqli_query($conn, "Select * from list_tbl Where id='$id'"); // SQL Query
      $count = mysqli_num_rows($query);

      if ($count > 0) {
        while ($row = mysqli_fetch_array($query)) {
          echo "<tr>";
          echo "<td>" . $row['id'] . "</td>";
          echo "<td>" . $row['details'] . "</td>";
          echo "<td>" . $row['date_posted'] . " - " . $row['time_posted'] . "</td>";
          echo "<td>" . $row['date_edited'] . " - " . $row['time_edited'] . "</td>";
          echo "<td>" . $row['public'] . "</td>";
          echo "</tr>";
        }
      } else {
        $id_exists = false;
      }
    }
    ?>
  </table>
  <br />
  <?php
  if ($count > 0) {
    echo '<form action="edit.php" method="POST">
    Enter new detail: <input type="text" name="details"/><br/>
    public post? <input type="checkbox" name="public[]" value="yes"/><br/>
    <input type="submit" value="Update List"/>
    </form>';
  } else {
    echo '<h2 align="center">There is no data to be edited.</h2>';
  }
  ?>
</body>

</html>