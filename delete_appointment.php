<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']);

    // Query to delete the appointment
    $sql = "DELETE FROM appointments WHERE id = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $id);

        // Execute the query and check success
        if ($stmt->execute()) {
            // After successful deletion, redirect with success message
            header("Location: manage_appointments.php?message=Appointment deleted successfully");
            exit();
        } else {
            echo "Error deleting record: " . $conn->error;
        }
        $stmt->close();
    }
}

$conn->close();
?>
