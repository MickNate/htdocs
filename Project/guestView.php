<?php

if(isset($_GET['ID'])){

    require_once "includes/dbh.inc.php";

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
    <head></head>

    <body>
        <?php
            echo "This is the page of {$result["firstname"]} {$result["lastname"]}";
            echo "<br>";
            echo "Description: ";
            echo "<br>";
            echo $result["userJob"];
        ?>
    </body>

</html>