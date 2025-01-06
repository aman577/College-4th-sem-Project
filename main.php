<?php
// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include 'db.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if email exists
    $check_email_query = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($check_email_query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify the password
        if ($password === $user['password']) {
            // Store user details in session
            $_SESSION['user'] = $user;
            header("Location: hellomain.htm");
            exit();
        } else {
            echo "<script>alert('Login unsuccessful: Incorrect password.'); window.location.href = 'mainlogin.php';</script>";
            exit();
        }
        
    } else {
        echo "<script>alert('Login unsuccessful: Credentials did not match.'); window.location.href = 'mainlogin.php';</script>";
        exit();
    }
} else {
    echo "Invalid request.";
    exit();
}
?>