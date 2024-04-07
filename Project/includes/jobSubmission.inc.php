<?php

require_once 'dbh.inc.php';
require_once "config_session.inc.php";

if($_SERVER["REQUEST_METHOD"] === "POST"){
    try {
    $userJob = $_POST["userJob"];
    $username=$_SESSION["user_username"];
    $_SESSION["user_userJob"] = $_POST["userJob"];

    $query = "UPDATE users SET userJob =  :userJob WHERE username = :username;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":userJob", $userJob);
    $stmt->bindParam(":username", $username);

    $stmt->execute();

    $pdo = null;
    $stmt = null;

    header("Location: ../profile.php");

    die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}