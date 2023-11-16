<?php
session_start(); //starts the session

if(!isset($_SESSION['user'])) { //checks if user is logged in
  header("location:index.php"); //redirects if user is not logged in.
  exit();
}

if($_SERVER['REQUEST_METHOD'] == "GET") {
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

  $id = $_GET['id'];
  mysqli_query($conn,"DELETE FROM list_tbl WHERE id='$id'");
  header("location:home.php");
  exit();
}
?>