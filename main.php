
<?php
include 'connect.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if email exists
    $check_email_query = "SELECT * FROM users WHERE email = ?";
    $stmt = $con->prepare($check_email_query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify the password
        if($password === $user['password']) {
            // Start a session and redirect to index.php
            session_start();
            $_SESSION['user'] = $user; // Store user info in the session
            header("Location: hellomain.htm");
            exit();
        } else {
            echo "Login unsuccessful: Incorrect password.";
            exit();
        }
    } else {
        echo "Login unsuccessful: Credentials did not match.";
        exit();
    }
} else {
    echo "Invalid request.";
    exit();
}
?>
