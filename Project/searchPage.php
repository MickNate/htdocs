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

    </head>
    <body>

        <h3>Search results:</h3>

        <?php

        if(empty($results)){
            echo "<div>";
            echo "<p>No results</p>";
            echo "</div>";
        }
        else{
            foreach($results as $row){
                echo "<a href='guestView.php?ID={$row['id']}'>{$row['firstname']} {$row['lastname']}</a>";
                
                //{htmlspecialchars($row['firstname']) . ' ' . htmlspecialchars($row['lastname'])}
                //htmlspecialchars($row["userJob"]);
               // echo htmlspecialchars($row["lastname"]);
                echo "</br>";
              //  echo htmlspecialchars($row["userJob"]);
            }
        }

        ?>
    </body>
    
</html>