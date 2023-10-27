<?php
include "../database/database.php";

if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check if username contains at least 5 characters and password contains at least 6 characters
    if (strlen($username) < 5 || strlen($password) < 6) {
        header("Location: ../redirect/unsuccessful.html");
    } else {
        $sql = "INSERT INTO twitter (username, password) VALUES ('$username', '$password')";
        
        if ($conn->query($sql) === true) {
            header("Location: ../redirect/successful.html");
        } else {
            header("Location: ../redirect/unsuccessful.html");
        }
    }
} else {
    header("Location: ../redirect/unsuccessful.html");
}

$conn->close();
?>