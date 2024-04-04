<?php
require_once "includes/config_session.inc.php";
require_once "includes/dbh.inc.php";

if($_SERVER["REQUEST_METHOD"] === "POST") {
    try {

    }
    catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}

else{
    header("Location: ../main.php");
    die();
}
?>

<!DOCTYPE html>
    <head>

    </head>
    <body>

        <?php
            echo "Username: " . $_SESSION["user_username"];
            echo "<br>";
            echo "First Name: " . $_SESSION["user_firstname"];
            echo "<br>";
            echo "Last Name: " . $_SESSION["user_lastname"];
            echo "<br>";
            echo "Member Since: " . $_SESSION["user_created_at"];
            echo "<br>";
            echo "Job Description: ";
            echo $_SESSION["user_userJob"];
            echo "<br>";;
        ?>
    </body>
</html>