<?php

require_once 'dbh.inc.php';
require_once "config_session.inc.php";

if($_SERVER["REQUEST_METHOD"] === "POST"){

    $original_poster = $_POST["original_poster"];
    $comment = $_POST["userComment"];
    $commenter = $_SESSION['user_id'];

    try {

        //NOTE FOR LATER: FIGURE OUT HOW TO AVOID DUPLICATES

        $query = "REPLACE INTO comments (original_poster, commenter, comment) VALUES 
        (:original_poster, :commenter, :comment);";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":original_poster", $original_poster);
        $stmt->bindParam(":commenter", $commenter);
        $stmt->bindParam(":comment", $comment);
    
        $stmt->execute();

        $pdo = null;
        $stmt = null;

        header("Location: ../guestView.php?ID=" . $original_poster);

        die();
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
}