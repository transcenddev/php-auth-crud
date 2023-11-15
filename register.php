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

echo "Connected successfully<br>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $bool = true;
  $query = mysqli_query($conn, "SELECT * FROM users_tbl"); //Query the users table

  while ($row = mysqli_fetch_array($query)) { //Display all rows from query
    $table_users = $row['username']; //the first username row is passed on to $table_users, and so on until the query is finished
    if ($username == $table_users) { //checks if there are any matching fields
      $bool = false; //set bool to false
      Print '<script>alert("Username is not available!");</script>'; //Prompt the user
      Print '<script>window.location.assign("register.php");</script>'; //redirects to register.php
    }
  }

  if ($bool) {
    mysqli_query($conn, "INSERT INTO users_tbl (username, password) VALUES ('$username','$password')"); //Insert the value to the table users_tbl
    Print '<script>alert("Successfully Registered");</script>'; //Prompt the user
    Print '<script>window.location.assign("register.php");</script>'; //redirects to register.php
  }
}
?>

<!DOCTYPE html>
  <html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <meta name="author" content="Your Name">
    <meta name="description" content="Description of your website">
    <link rel="icon" href="">
  </head>
  <body>
    <h2>Registration Page</h2>
    <a href="index.php">Click here to go back</a><br><br>
    
    <form action="register.php" method="POST">
    Enter Username: <input type="text" name="username" required="required" /> <br/>
    Enter password: <input type="password" name="password" required="required" /> <br/>
    <input type="submit" value="Register"/>
    </form>
    
  </body>
</html>