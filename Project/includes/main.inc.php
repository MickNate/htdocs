<?php

if($_SERVER["logged_in"] == true) {
    try{
        require_once "dbh.inc.php";
        require_once "config_session.inc.php";
    }
    catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}
else{
    header("Location: ../login.php");
}