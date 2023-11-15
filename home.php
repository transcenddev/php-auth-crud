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
  <title>My first PHP Website</title>
</head>
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
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </table>
</body>
</html>