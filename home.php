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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <meta name="author" content="Reymar, transcenddev">
    <meta name="description" content="php authentication crud, web design, web development">
    <link rel="icon" href="">
    <link rel="stylesheet" href="./styles/main.css">
    <script src="./js/main.js" defer></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
  </head>
  <body>
    <header class="navbar-dashboard flex">
      <a href="index.php" class="btn-back"><span class="material-icons-sharp">arrow_back_ios</span></a>
      <a href="logout.php" class="btn-logout">Logout</a>
    </header>
    <div class="wrapper">
    
        <div class="flex">
          <h1>Dashboard</h1>

          <button id="openModalBtn" class="open-modal-btn btn-primary">Add Item</button>
        </div>
      <div class="dim-overlay" id="dimOverlay"></div> <!-- Added a div for the dim overlay -->

      <div id="modalOverlay" class="modal-overlay">
        <div id="modalContent" class="modal-content">
          <div class="flex">
            <h3>Add to list</h3>
            <span id="closeModalBtn" class="close-modal-btn">&times;</span>
          </div>
          <form action="add.php" method="POST" class="add-form">
            <div class="input-group">
              <input type="text" name="details" id="details" placeholder="What's the details? <?php echo $user; ?>" required maxlength="13">
            </div>

            <div class="input-group checkbox-container">
              <input class="checkbox-input" type="checkbox" name="public[]" id="public" value="yes">
              <label class="checkbox-label" for="public">Public post?</label>
            </div>

            <button type="submit" class="btn-primary">Add to list</button>
          </form>
        </div>
      </div>

      <table>
        <tr>
          <th>ID</th>
          <th>Details</th>
          <th>Post Time</th>
          <th>Edit Time</th>
          <th>Public</th>
          <th>Edit</th>
          <th>Delete</th>
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
            echo "<td data-cell='name'>" . $row['id'] . "</td>";
            echo "<td data-cell='details'>" . $row['details'] . "</td>";
            echo "<td data-cell='posted'>" . $row['date_posted'] . "-" . $row['time_posted'] . "</td>";
            echo "<td data-cell='edited'>" . $row['date_edited'] . "-" . $row['time_edited'] . "</td>";
            echo "<td data-cell='public'>" . $row['public'] . "</td>";
            echo "<td data-cell='edit'><a href='edit.php?id=" . $row['id'] . "'><span class='material-icons-sharp btn-edit'>edit</span></a></td>";
            echo "<td data-cell='delete'><a href='#' onclick='myFunction(" . $row['id'] . ")'><span class='material-icons-sharp btn-delete'>
            delete
            </span></a></td>";
            
          echo "</tr>";
        }
        ?>
      </table>
    </div>

    <script>
        var openModalBtn = document.getElementById("openModalBtn");
        var closeModalBtn = document.getElementById("closeModalBtn");
        var modalOverlay = document.getElementById("modalOverlay");
        var dimOverlay = document.getElementById("dimOverlay");

        openModalBtn.addEventListener("click", function() {
          modalOverlay.style.display = "block";
          document.body.classList.add("modal-open");
          dimOverlay.style.display = "block";
        });

        closeModalBtn.addEventListener("click", function() {
          modalOverlay.style.display = "none";
          document.body.classList.remove("modal-open");
          dimOverlay.style.display = "none";
        });
    </script>

    <script>
      function myFunction(id) 
      {
        var r = confirm("Are you sure you want to delete this record?");
        if (r) {
          window.location.assign("delete.php?id=" + id);
        }
      }
    </script>
  </body>
</html>