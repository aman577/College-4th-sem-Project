<?php
// Database connection details
$host = "localhost";
$user = "root";
$password = "";
$database = "project";

// Create a connection
$con = mysqli_connect($host, $user, $password, $database);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Optional: Display a success message for testing
// echo "Connected successfully";
?>
