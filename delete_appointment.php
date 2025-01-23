<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'project');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Update the status of the appointment instead of deleting it
    $sql = "UPDATE appointments SET status = 'Deleted' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Appointment marked as deleted successfully.";
    } else {
        echo "Error updating appointment: " . $conn->error;
    }

    $conn->close();

    // Redirect back to admin panel
    header("Location: admin_panel.php");
    exit();
}
?>
