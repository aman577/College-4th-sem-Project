<?php
session_start();

if (!isset($_SESSION['user']) || !is_array($_SESSION['user'])) {
    echo "You must be logged in to update your profile.";
    exit();
}

include 'db.php';

// Get the updated values
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format.";
    exit();
}

$phone_pattern = "/^(98|97|96)[0-9]{8}$/";
if (!preg_match($phone_pattern, $phone)) {
    echo "Invalid phone number.";
    exit();
}

// Get current user's email from session
$session_email = $_SESSION['user']['email'] ?? '';

if (!$session_email) {
    echo "Session email not found.";
    exit();
}

// Start transaction to ensure both tables update together
$conn->begin_transaction();

try {
    // Update email and phone in users table
    $update_user_query = "UPDATE users SET email = ?, phone = ? WHERE email = ?";
    $stmt = $conn->prepare($update_user_query);
    $stmt->bind_param("sss", $email, $phone, $session_email);
    
    if (!$stmt->execute()) {
        throw new Exception("Error updating user profile: " . $stmt->error);
    }
    
    // Update email in appointments table
    $update_appointments_query = "UPDATE appointments SET email = ? WHERE email = ?";
    $stmt = $conn->prepare($update_appointments_query);
    $stmt->bind_param("ss", $email, $session_email);
    
    if (!$stmt->execute()) {
        throw new Exception("Error updating appointments: " . $stmt->error);
    }

    // Commit transaction
    $conn->commit();

    // Update session variables
    $_SESSION['user']['email'] = $email;
    $_SESSION['user']['phone'] = $phone;

    echo "Profile and appointments updated successfully!";
} catch (Exception $e) {
    // Rollback transaction in case of error
    $conn->rollback();
    echo "Transaction failed: " . $e->getMessage();
}

// Close connections
$stmt->close();
$conn->close();
?>
