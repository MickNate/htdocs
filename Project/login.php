<?php
  require_once 'includes/login_view.inc.php';
  require_once 'includes/config_session.inc.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Welcome to Employee Review!</title>
    </head>
    <body>
        <p>Please either login or create an account</p>
        <form action="includes/login.inc.php" method="post">
            <label><b>Username: </b></label></br>
            <input type="text" name="username" id="username" placeholder="Username"></br>
            <label><b>Password: </b></label></br>
            <input type="password" name="password" id="password" placeholder="Password"></br>
            <button>Login</button>
        </form>

        <a href="create_account.php">Create Account</a>

        
        <?php
            check_login_errors();
        ?>

        
    </body>
</html>