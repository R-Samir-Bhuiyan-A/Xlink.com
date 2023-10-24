<?php
// Database connection details
$servername = "b6mpwzkhywwvirfe650p-mysql.services.clever-cloud.com"; // Change this to your MySQL server's address
$username = "urn1vlhzdozswytm"; // Change this to your MySQL username
$password = "LIAPQrcETXJzpDAfokNe"; // Change this to your MySQL password
$dbname = "b6mpwzkhywwvirfe650p"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>





