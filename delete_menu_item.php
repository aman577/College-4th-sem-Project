<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'project');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Get the current image path
    $result = $conn->query("SELECT image FROM menu_items WHERE id = $id");
    $row = $result->fetch_assoc();
    if ($row) {
        unlink($row['image']); // Delete the image file
    }

    // Delete from database
    $stmt = $conn->prepare("DELETE FROM menu_items WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: admin_panel.php");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
