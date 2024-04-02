<?php
    require_once 'includes/config_session.inc.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>
            Welcome to Employee Review!
        </title>    
    </head>
    <body>

        <?php
            echo "Welcome to Employee Review, " . $_SESSION["user_firstname"];
            #output_username();
        ?>
        <p>Please type in the name of the individual you are looking for or click create to make own page!</p>

        <form action="includes/logout.inc.php" method="post">
            <button>Logout</button>
        </form>
    </body>
</html>