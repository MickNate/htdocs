<?php

    require "includes/dbh.inc.php";

    if(isset($_GET['ID'])){

    //    require "includes/dbh.inc.php";

        $ID = $_GET['ID'];
        
        $query = "SELECT * FROM users WHERE id = :id;";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":id", $ID);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $pdo = null;
        $stmt = null;
    }
    else{
        header("Location: ../main.php");
    }

?>

<!DOCTYPE html>
    <head>
        <title>
            <?php
                echo "Profile of {$result["firstname"]} {$result["lastname"]}";
            ?>
        </title>
    </head>

    <body>
        <h1>
            Profile View <?php $result ?>
        </h1>
        <h2>Summary: </h2>
        <?php
            echo "This is the page of {$result["firstname"]} {$result["lastname"]}";
            echo "<br>";
            echo "Description: ";
            echo "<br>";
            echo $result["userJob"];
        ?>
        <br>
        <h2>
            Comments: 
        </h2>

       <form action="includes/guestView.inc.php" method="post">
            <label for="userComment"><?php echo "Have you worked with {$result["firstname"]}?" ?></label><br>
            <textarea id="userComment" name="userComment" rows="5" cols="30"><?php echo "Please leave a review!"?></textarea><br>
            <button>Comment</button>
            <input type="hidden" name="original_poster" value=<?php echo $ID ?> />
        </form>
    </body>
</html>

<?php

    try {

        require "includes/dbh.inc.php";

        $query = "SELECT * FROM comments WHERE original_poster = :original_poster;";
//        echo $original_poster;

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":original_poster", $ID);
        
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
                echo "{$row['commenter']}";
                echo "<br>";
                echo "{$row['comment']}";
                echo "<br>";
                echo "{$row['commented_at']}";
                echo "<br>";
                echo "<br>";
            }
        }

?>