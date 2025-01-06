<?php
$host = 'localhost'; // Your DB host
$username = 'root';  // Your DB username
$password = '';      // Your DB password
$database = 'project';  // Your DB name

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
