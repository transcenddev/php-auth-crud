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
  <link rel="stylesheet" href="./styles/main.css">

  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Page</title>
    <meta name="author" content="Reymar, transcenddev">
    <meta name="description" content="php authentication crud, web design, web development">
    <link rel="icon" href="">
    <link rel="stylesheet" href="./styles/main.css">
    <link rel="stylesheet" href="./styles/edit.css">
    <script src="./js/main.js" defer></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
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
  <!-- Nav -->
  <header class="header flex">
    <div class="navbar-brand">
      <a href="#" class="navbar-brand flex" aria-label="homepage">
        <span class="material-icons-sharp">all_inclusive</span>
      </a>
    </div>
    <nav class="navbar">
      <ul class="nav-list flex">
        <li>
          <a href="home.php" class="nav-links flex"><span class="material-icons-sharp">
          keyboard_backspace
          </span>Return</a>
        </li>
        <li>
          <a href="logout.php" class="nav-links flex">
            <span class="material-icons-sharp">logout</span>
          </a>
        </li>
      </ul>
    </nav>
  </header>
  <!-- Main -->
  <div class="wrapper">
    <h2>Currently Selected.</h2>
    <?php
    if (!isset($_SESSION['user'])) {
      header("location:index.php"); // redirects if user is not logged in
    }
    $user = $_SESSION['user']; //assigns user value
    ?>
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
            echo "<td data-cell='name'>" . $row['id'] . "</td>";
            echo "<td data-cell='details'>" . $row['details'] . "</td>";
            echo "<td data-cell='posted'>" . $row['date_posted'] . " - " . $row['time_posted'] . "</td>";
            echo "<td data-cell='edited'>" . $row['date_edited'] . " - " . $row['time_edited'] . "</td>";
            echo "<td data-cell='public'>" . $row['public'] . "</td>";
            echo "</tr>";
          }
        } else {
          $id_exists = false;
        }
      }
      ?>
    </table>
    <br />
      <?php if ($count > 0): ?>

      <form action="edit.php" method="POST">

        <div class="input-group">
          <input type="text" name="details" id="details" placeholder="What's the new detail <?php echo $user; ?>?" required maxlength="13">
        </div>

        <div class="input-group checkbox-container">
          <input class="checkbox-input" type="checkbox" name="public[]" id="public" value="yes" >
          <label class="checkbox-label" for="public">Public post?</label>
        </div>

        <input type="submit" value="Update List" class="btn-primary"/>
      </form>

      <?php else: ?>

      <h2 align="center">There is no data to be edited.</h2>

      <?php endif; ?>
  </div>
</body>

</html>