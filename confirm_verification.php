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

    // Update the database to mark the appointment as verified
    $query = "UPDATE appointments SET status = 'verified' WHERE id = ?";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $appointmentId);

    if ($stmt->execute()) {
        // Only send the email if the status update is successful
        $subject = 'Appointment Booking Confirmation';
        $body = 'Your appointment has been successfully verified and booked. Thank you for choosing MeroParlor!';
        
        if (sendMail($email, $subject, $body)) {
            // Redirect to the admin panel if the email is sent successfully
            header("Location: admin_panel.php"); // Change 'admin_panel.php' to your actual admin panel page URL
            exit();
        } else {
            // Log error if email fails to send
            error_log("Failed to send confirmation email to $email.");
            echo "Appointment verified, but failed to send confirmation email.";
        }
    } else {
        // In case of failure to update the status
        echo "Failed to verify appointment.";
    }
} else {
    echo "Invalid request.";
}
?>
