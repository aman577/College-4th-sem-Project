<?php
// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

session_unset(); // Remove all session variables
session_destroy(); // Destroy the session

header("Location: hello.php");  // Redirect to login page
exit();
?>
