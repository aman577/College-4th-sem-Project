<?php
// Start session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Database connection
$conn = new mysqli('localhost', 'root', '', 'project');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Assuming user ID is stored in session as an integer
    if (isset($_SESSION['user']['id'])) {
        $userId = $_SESSION['user']['id'];

        // Update query to set new email and phone based on user ID
        $sql = "UPDATE users SET email = ?, phone = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);

        // Bind parameters (s for string and i for integer)
        $stmt->bind_param('ssi', $email, $phone, $userId);

        // Execute the query
        if ($stmt->execute()) {
            // Update session data
            $_SESSION['user']['email'] = $email;
            $_SESSION['user']['phone'] = $phone;
            echo "Profile updated successfully.";
        } else {
            echo "Error: " . $conn->error;
        }

        $stmt->close();
    } else {
        echo "User is not logged in.";
    }

    $conn->close();
}
?>
