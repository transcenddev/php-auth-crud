<?php
session_start();

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $bool = true;

  $query = mysqli_query($conn, "SELECT * FROM users_tbl WHERE username='$username'"); // Query the users table
  $exists = mysqli_num_rows($query); //Checks if username exists

  $table_users = "";
  $table_password = "";

  if ($exists > 0) { //IF there are no returning rows or no existing username
    while ($row = mysqli_fetch_assoc($query)) { // display all rows from query
      $table_users = $row['username']; // the first username row is passed on to $table_users, and so on until the query is finished
      $table_password = $row['password']; // the first password row is passed on to $table_password, and so on until the query is finished
    }

    if (($username == $table_users) && ($password == $table_password)) { //checks if there are any matching fields
      if ($password == $table_password) {
        $_SESSION['user'] = $username; //set the username in a session. This serves as a global variable
        header("location: home.php"); // redirects the user to the authenticated home page
      }
    } else {
      // Prompts the user
      Print '<script>alert("Incorrect Password!");</script>';
      // redirects to login.php
      Print '<script>window.location.assign("login.php");</script>';
    }
  } else {
    // Prompts the user
    Print '<script>alert("Incorrect username!");</script>';
    // redirects to login.php
    Print '<script>window.location.assign("login.php");</script>';
  }
}
?>