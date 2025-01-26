<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "project");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle DELETE request
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM submenu_items WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Submenu item deleted successfully.";
        header("Location: admin_panel.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
