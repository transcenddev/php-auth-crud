<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./styles/navbar.css">
  <title>navbar</title>
</head>
<body>
  <!-- <header class="navbar flex">
    <a href="#" class="navbar__logo" title="Logo">
      <span class="material-icons-sharp">all_inclusive</span>
    </a>
    <nav class="navbar__nav">
      <a href="index.php" class="navbar__link">Home</a>
      <a href="#about" class="navbar__link">About</a>
      <a href="#contact" class="navbar__link">Contact</a>
      <a href="login.php" id="login" class="navbar__link flex">Login<span class="material-icons-sharp">chevron_right</span></a>
    </nav>
  </header> -->

  <!-- Navbar -->
  <header class="primary-header">
      <a href="#" class="navbar-brand flex" aria-label="homepage">
        <span class="material-icons-sharp">all_inclusive</span>
      </a>
      <button
        class="mobile-nav-toggle"
        aria-controls="primary-navigation"
        aria-expanded="false"
      >
        <!-- <span class="sr-only">Menu</span --><i
          class="fa-solid fa-crab"
        ></i>
        <span class="material-icons-sharp"> menu </span>
      </button>
      <nav>
        <ul
          id="primary-navigation"
          data-visible="false"
          class="nav__list primary-navigation"
        >
          <li class="nav__list-item">
            <a href="index.php" class="nav__link">Home</a>
          </li>
          <li class="nav__list-item">
            <a href="#" class="nav__link">About</a>
          </li>
          <li class="nav__list-item">
            <a class="nav__link nav__link--btn" href="login.php">Login</a>
          </li>
          <li class="nav__list-item">
            <a
              class="nav__link nav__link--btn nav__link--btn--highlight"
              href="register.php"
              >Register</a
            >
          </li>
        </ul>
      </nav>
    </header>

  <script src="./js/navbar.js "></script>
</body>
</html>