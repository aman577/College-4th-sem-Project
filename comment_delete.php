<?php
// Start session
session_start();

// Database connection
$conn = new mysqli('localhost', 'root', '', 'project');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if 'id' is passed for deletion
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Delete the comment from the database
    $sql = "DELETE FROM comments WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        header("Location: admin_panel.php");  // Redirect back to admin panel
        exit();
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
}

// Close connection
$conn->close();
?>
