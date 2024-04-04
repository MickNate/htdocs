<?php

require_once 'dbh.inc.php';
require_once "config_session.inc.php";

if($_SERVER["REQUEST_METHOD"] === "GET"){
    
    $userSearch = $_POST["userSearch"];

    try {
        require_once "includes/dbh.inc.php";

        $query = "SELECT * FROM users WHERE firstname = :userSearch OR WHERE lastname = :userSearch;";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":userSearch", $userSearch);

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

