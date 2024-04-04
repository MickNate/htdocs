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
        <p>Are you looking for someone, or would you like to create your own page?</p>


        <form class="searchform" action="searchPage.php" method="POST">
            <label for="search">User Search:</label>
            <input id="search" type="text" name="usersearch" placeholder="Please type someone's name">
            <button>Search</button>
        </form>

        <br>
        <br>
        
        <form action="jobSubmission.php" method="post">
            <label for="jobCreate">Create/Update My Page: </label>
            <button>Create</button>
        </form>

        <br>
        <br>
        <br>

        <form action="profile.php" method="post">
            <button>View Profile</button>
        </form>
        <br>
        <br>

        <form action="includes/logout.inc.php" method="post">
            <button>Logout</button>
        </form>
    </body>
</html>