<?php
session_start();
// Clear all session data
session_unset();
session_destroy();
header("Location: ../index.html"); // Redirect to the login page
exit();
?>