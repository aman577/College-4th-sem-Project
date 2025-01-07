<?php
// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Database connection
include 'db.php';  // Adjust the path if necessary

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $userEmail = $_POST['user_email'];
    $comment = $_POST['comment'];

    // Validate the input (basic validation)
    if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit();
    }

    // Prepare SQL statement to insert the comment into the database
    $sql = "INSERT INTO comments (user_email, comment) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);

    // Bind parameters (s for string)
    $stmt->bind_param('ss', $userEmail, $comment);

    // Execute the query
    if ($stmt->execute()) {
        echo "Your comment has been submitted successfully.";
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
}

// Close connection
$conn->close();
?>
