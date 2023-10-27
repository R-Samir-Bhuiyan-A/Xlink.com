<?php
session_start();

// Check if the user is already logged in
if (isset($_SESSION["user"])) {
    // Redirect to the stored intended page or a default page (e.g., index.php)
    if (isset($_SESSION["intended_page"])) {
        header("Location: " . $_SESSION["intended_page"]);
    } else {
        header("Location: ../xpanel/facebook.php");
    }
    exit();
}

// The rest of your login and authentication logic goes here
if (isset($_POST["username"]) && isset($_POST["password"])) {
    // Replace these dummy credentials with your actual authentication logic
    if ($_POST["username"] === "SX69" && $_POST["password"] === "SX69") {
        // Set a session variable to indicate the user is logged in
        $_SESSION["user"] = $_POST["username"];
        
        // Check if there's an intended page
        if (isset($_SESSION["intended_page"])) {
            $intended_page = $_SESSION["intended_page"];
            // Clear the intended page from the session
            unset($_SESSION["intended_page"]);
            header("Location: " . $intended_page);
        } else {
            header("Location: ../xpanel/facebook"); // Redirect to the main page (index.php) or any other default page
        }
        exit();
    } else {
        echo "Login failed. Please try again.";
    }
}
?>








<!DOCTYPE html>
<html>
<head>
    <title>XPanel - Login</title>
    <link rel="stylesheet" href="Lock.css" />
    <!-- Include the CSS from your theme -->
</head>
<body>
    <header>
        <h1>XPanel</h1>
    </header>
 <div class="login-box">
    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" />
        <br />
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" />
        <br />
        <input type="submit" value="Login" />
    </form>

    <div class="forgot-password">
        <a href="mailto:shamirbhuiyan2@gmail.com">Forgot your password? Mail me</a>
    </div>

    <div class="register">
        <p>
            Don't have an account?
            <a href="https://facebook.com/R.samir.bhuiyan.a"
            ">Contact me</a>
        </p>
    </div>
 </div>

    <footer>
        <p>&copy; 2023 RSPanel. All rights reserved.</p>
    </footer>
</body>
</html>