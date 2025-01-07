<?php
// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Database connection
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Check if user is logged in (session contains user data)
    if (isset($_SESSION['user']['email'])) {
        $currentEmail = $_SESSION['user']['email'];  // Get the email from session
        
        // Update query to set new email and phone based on the current logged-in email
        $sql = "UPDATE users SET email = ?, phone = ? WHERE email = ?";
        $stmt = $conn->prepare($sql);

        // Bind parameters (s for string)
        $stmt->bind_param('sss', $email, $phone, $currentEmail);

        // Execute the query
        if ($stmt->execute()) {
            // Update session data to reflect the new email and phone
            $_SESSION['user']['email'] = $email;
            $_SESSION['user']['phone'] = $phone;

            // Send a success message back to the front end
            echo "Profile updated successfully.";
        } else {
            echo "Error: " . $conn->error;
        }

        $stmt->close();
    } else {
        echo "User is not logged in.";
    }
}

// Close connection
$conn->close();
?>
