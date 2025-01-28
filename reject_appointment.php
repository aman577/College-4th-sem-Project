<?php
session_start();
include_once './API/sendmail.php';

if (isset($_SESSION['user'])) {
    // Safely retrieve the user data from the session
    $email = isset($_SESSION['user']['email']) ? $_SESSION['user']['email'] : '';
}
include 'db.php';

if (isset($_POST['id'])) {
    $appointmentId = $_POST['id'];

    // Update the database to mark the appointment as rejected
    $query = "UPDATE appointments SET status = 'rejected' WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $appointmentId);

    if ($stmt->execute()) {
        $subject = 'Appointment Booking Failure';
        $body = 'Your appointment has been rejected , Sorry!. Book a New appointment Please';
        
        if (sendMail($email, $subject, $body)) {
        // Appointment rejected successfully, redirect to the admin panel
        header("Location: admin_panel.php"); // Change 'admin_panel.php' to your actual admin panel page URL
        exit();}
    } else {
        // Log error if email fails to send
        error_log("Failed to send confirmation email to $email.");
        echo "Appointment failed, but failed to send confirmation email.";
    }
} else {
    echo "Invalid request.";
}
?>
