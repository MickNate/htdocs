<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $username =$_POST["username"];
    $password =$_POST["password"];
    $email =$_POST["email"];
    $firstname =$_POST["firstname"];
    $lastname =$_POST["lastname"];
    
    try {
        require_once "dbh.inc.php";

        $query = "INSERT INTO users (username, password, email, firstname, lastname) VALUES
        (?, ?, ?, ?, ?)";

        $stmt = $pdo->prepare($query);

        $stmt->execute([$username, $password, $email, $firstname, $lastname]);
        
        $pdo = null;

        $stmt = null;

        header("Location: ../create_account.html");

        die();
    } catch(PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}
else{
    header("Location: ../create_account.html");
}