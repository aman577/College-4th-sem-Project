<?php
// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: mainlogin.php");  // Redirect to login page if not logged in
    exit();
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
</head>
<body>
    <h1>Welcome, <?php echo htmlspecialchars($user['first_name']); ?></h1>
    <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
    <p>Phone: <?php echo isset($user['phone']) ? htmlspecialchars($user['phone']) : 'N/A'; ?></p>
    <p>Membership: <?php echo isset($user['membership']) ? htmlspecialchars($user['membership']) : 'N/A'; ?></p>
    <p>Joined On: <?php echo isset($user['joined_on']) ? htmlspecialchars($user['joined_on']) : 'N/A'; ?></p>
</body>
</html>
