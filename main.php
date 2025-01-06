<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted for login
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    // Get form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if user exists
    $sql_check_user = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql_check_user);

    if ($result->num_rows > 0) {
        // User found, check password
        $user = $result->fetch_assoc();
        if ($user['password'] == $password) {
            // Password matches, login success
            $_SESSION['user'] = $user; // Set user data in session
            header("Location: hellomain.htm"); // Redirect to the user's dashboard or home page
            exit();
        } else {
            // Incorrect password
            echo "Invalid password. Please try again.";
        }
    } else {
        // User not found
        echo "Email is not registered. Please sign up.";
    }
}

$conn->close();
?>
