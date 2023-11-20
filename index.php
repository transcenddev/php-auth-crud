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
    <title>Home Page</title>
    <meta name="author" content="Reymar, transcenddev">
    <meta name="description" content="php authentication crud, web design, web development">
    <link rel="icon" href="">
    <link rel="stylesheet" href="./styles/main.css">
    <script src="./js/navbar.js" defer></script>
    <script src="./js/main.js" defer></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
  </head>
<body>
  <?php include('navbar.php'); ?>


    <div class="hero-bg">
      <section class="hero wrapper" id="home">
        <h1>Welcome world to the <span>first php website</span> I have ever created.</h1>
        <!-- <p>My inaugural PHP website features a user authentication system with Create, Read, Update, and Delete (CRUD) functionality. Users can register, log in, and access a dashboard to manage a dynamic list of items. The website utilizes PHP, MySQL, HTML, CSS, and JavaScript to create an interactive and functional web experience.</p> -->
        <a href="#learn-more-section" class="btn-cta flex">Learn more
          <span class="material-icons-sharp">chevron_right</span>
        </a>
        <!-- <a href="register.php"> Click here to register </a> -->
      </section>
    </div>
    <section class="learn-more-section wrapper" id="learn-more-section">
      <h2>These are some of the functionalities</h2>
      <p>Experience CRUD operations, login, and registration functionalities as I take my first steps in web development.</p>
    </section>
    <section class="wrapper">
      <h2>These are the data entries</h2>
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
          Print "<td data-cell='ID'>".$row['id']."</td>";
          Print "<td data-cell='details'>".$row['details']."</td>";
          Print "<td data-cell='posted'>".$row['date_posted']." - ".$row['time_posted']."</td>";
          Print "<td data-cell='edited'>".$row['date_edited']." - ".$row['time_edited']."</td>";
          Print "</tr>";
        }
        ?>
      </table>
    </section>
    <section class="wrapper">
      <h2>Test it out, Goodbye world.</h2>
    </section>

  <footer>
    <p>&copy; 2023 transcenddev</p>
  </footer>
</body>
</html>