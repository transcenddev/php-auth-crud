<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <meta name="author" content="Your Name">
    <meta name="description" content="Description of your website">
    <link rel="icon" href="">
</head>
<body>
  <h2>Login Page</h2>
  <a href="index.php">Click here to go back</a><br/><br/>
  <form action="checklogin.php" method="POST">
    Enter Username: <input type="text" name="username" required="required" /> <br/>
    Enter password: <input type="password" name="password" required="required" /> <br/>
    <input type="submit" value="Login"/>
  </form>
</body>
</html>