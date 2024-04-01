<?php
    require_once 'includes/signup_view.inc.php';
    session_start();
?>

<!DOCTYPE html>
<html>
  <head lang="en">
  <meta charset="UTF-8">
    <title>Create Account</title>
  </head>
<body>
  <p>Please fill out the information below</p>
  <form action="includes/signup.inc.php" method="post">
    <label><b>Username: </b></label></br>
    <input type="text" name="username" id="username" placeholder="Username"></br>
    <label><b>Password: </b></label></br>
    <input type="password" name="password" id="password" placeholder="Password"></br>
    <label><b>Email Address: </b></label></br>
    <input type="text" name="email" id="email" placeholder="E-Mail"></br>
    <label><b>First Name: </b></label></br>
    <input type="text" name="firstname" id="firstname" placeholder="First Name"></br>
    <label><b>Last Name: </b></label></br>
    <input type="text" name="lastname" id="lastname" placeholder="Last Name"></br>
    <button>Submit</button><br>
  </form>

  <?php
        check_signup_errors();
  ?>
</body>
</html>