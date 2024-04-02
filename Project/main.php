<?php
    require_once 'includes/config_session.inc.php';

    if($_SESSION["logged_in"] == true){

    }
    else{
        header("Location: ./login.php");
    }
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
        ?>
        <p>Please type in the name of the individual you are looking for or click create to make own page!</p>

        <form action="includes/jobSubmission.php" method="post">
            <label for="userJob">Please let us know what your job duties have been</label><br>
            <textarea id="userJob" name="userJob" rows="5" cols="30"></textarea><br>
            <button>Submit</button>
        </form>

        <br>
        <br>
        <br>
        <form action="includes/logout.inc.php" method="post">
            <button>Logout</button>
        </form>
    </body>
</html>