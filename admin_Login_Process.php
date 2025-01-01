<?php
// Include database connection file
include 'connect.php';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to check username and password
    $check_admin_query = "SELECT * FROM admins WHERE username = ? AND password = ?";
    $stmt = $con->prepare($check_admin_query);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Admin credentials are valid, start a session
        session_start();
        $_SESSION['admin'] = $username; // Store admin username in the session
        
        // Redirect to the admin dashboard
        header("Location: admin_dashboard.php");
        exit();
    } else {
        // Invalid credentials
        echo "<script>alert('Invalid username or password'); window.location.href='mainlogin.php';</script>";
        exit();
    }
} else {
    // If the form wasn't submitted correctly
    echo "Invalid request.";
    exit();
}
?>
