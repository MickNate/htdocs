<?php

if($_SERVER["REQUEST_METHOD"] === "POST"){
    
    $usersearch = $_POST["usersearch"];

    try {
        require_once "includes/dbh.inc.php";

        $query = "SELECT * FROM users WHERE firstname = :usersearch OR lastname = :usersearch;";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":usersearch", $usersearch);

        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $pdo = null;
        $stmt = null;

        } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}
else{
    header("Location: ../main.php");
}
?>

<!DOCTYPE html>
    <head>
        <title>Search Results</title>
    </head>
    <body>

        <form action="main.php" method="post">
            <button>Return to Home</button>
        </form>
        <br>
       <form action="profile.php" method="post">
            <button>View Profile</button>
        </form>
        <br>
        <br>

        <form action="includes/logout.inc.php" method="post">
            <button>Logout</button>
        </form>
        <h3>Search results:</h3>

        <form class="searchform" action="searchPage.php" method="POST">
            <label for="search">User Search:</label>
            <input id="search" type="text" name="usersearch" placeholder="Please type someone's name">
            <button>Search</button>
        </form>

        <?php

        if(empty($results)){
            echo "<div>";
            echo "<p>No user with that name. Double check your spelling and try just looking up one of their names at a time.</p>";
            echo "</div>";
        }
        else{
            foreach($results as $row){
                echo "<a href='guestView.php?ID={$row['id']}'>{$row['firstname']} {$row['lastname']}</a>";
                echo "</br>";
            }
        }

        ?>
    </body>
    
</html>