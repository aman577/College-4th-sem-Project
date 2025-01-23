<?php
include 'db.php';

if (isset($_POST['id'])) {
    $appointmentId = $_POST['id'];

    // Update the database to mark the appointment as verified
    $query = "UPDATE appointments SET status = 'verified' WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $appointmentId);

    if ($stmt->execute()) {
        // Appointment verified successfully, redirect to the admin panel
        header("Location: admin_panel.php"); // Change 'admin_panel.php' to your actual admin panel page URL
        exit();
    } else {
        // In case of failure
        echo "Failed to verify appointment.";
    }
} else {
    echo "Invalid request.";
}
?>
