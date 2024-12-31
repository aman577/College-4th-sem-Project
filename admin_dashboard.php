<?php
// Start session and check if admin is logged in
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: mainlogin.php");
    exit();
}

// Admin is logged in, display dashboard
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        h1 {
            margin-bottom: 20px;
        }
        a {
            text-decoration: none;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
            margin: 5px;
        }
        a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Welcome to the Admin Dashboard, <?php echo $_SESSION['admin']; ?>!</h1>
    <a href="admin_panel.php">Go to Appointment Management</a>
    <a href="logout.php">Logout</a>
</body>
</html>
