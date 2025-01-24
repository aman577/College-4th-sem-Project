<?php
// Start session and check if the user is logged in
session_start();
if (!isset($_SESSION['user'])) {
    echo "You must be logged in to update your profile.";
    exit();
}

// Get the updated values
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';

// Validate email and phone
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format.";
    exit();
}

$phone_pattern = "/^(98|97|96)[0-9]{8}$/";
if (!preg_match($phone_pattern, $phone)) {
    echo "Invalid phone number.";
    exit();
}

// Update user details in the database
include 'db.php';
$user_id = $_SESSION['user']['id']; // Assuming 'id' is in the session data

// Prepare update query
$update_query = "UPDATE users SET email = ?, phone = ? WHERE id = ?";
$stmt = $conn->prepare($update_query);
$stmt->bind_param("ssi", $email, $phone, $user_id);

if ($stmt->execute()) {
    // Update the session with new values
    $_SESSION['user']['email'] = $email;
    $_SESSION['user']['phone'] = $phone;
    echo "Profile updated successfully!";
} else {
    echo "Error updating profile.";
}
?>
