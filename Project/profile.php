<?php
require_once "includes/config_session.inc.php";
require_once "includes/dbh.inc.php";

if($_SERVER["REQUEST_METHOD"] === "POST" or "GET") {
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

        <form action="main.php" method="post">
            <button>Return to Home</button>
        </form>
        <br>
        <br>

        <form action="includes/logout.inc.php" method="post">
            <button>Logout</button>
        </form>

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

            try {

                require "includes/dbh.inc.php";
        
                $query = "SELECT * FROM comments WHERE original_poster = :original_poster;";
        
                $stmt = $pdo->prepare($query);
        
                $stmt->bindParam(":original_poster", $_SESSION["user_id"]);
                
                $stmt->execute();
        
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
                $pdo = null;
        
                $stmt = null;
        
                } catch (PDOException $e) {
                    die("Query failed: " . $e->getMessage());
                }
        
                if(empty($results)){
                    echo "<div>";
                    echo "<p>No comments yet</p>";
                    echo "</div>";
                }
                else{
                    foreach($results as $row){
        
                        require "includes/dbh.inc.php";
                        $query = "SELECT * FROM users WHERE id = :commenter;";
                        $stmt = $pdo->prepare($query);
                        $stmt->bindParam(":commenter", $row["commenter"]);
                        $stmt->execute();
        
                        $resCom = $stmt->fetch(PDO::FETCH_ASSOC);
                        //return $resCom;
        
                        echo "<br>";
                        echo "{$resCom['firstname']} {$resCom['lastname']}";
                        echo "<br>";
                        echo "{$row['comment']}";
                        echo "<br>";
                        echo "{$row['commented_at']}";
                        echo "<br>";
                        echo "<br>";
                    }
                }
        ?>
    </body>
</html>