<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'project');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DELETE FROM messages WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "message deleted successfully.";
    } else {
        echo "Error deleting appointment: " . $conn->error;
    }

    $conn->close();

    // Redirect back to admin panel
    header("Location: admin_panel.php");
    exit();
}
?>
