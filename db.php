<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted for registration
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signUp'])) {
    // Get form data
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    // Check if the email is already registered
    $sql_check_email = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql_check_email);

    if ($result->num_rows > 0) {
        // Email already exists
        echo "Email is already registered. Please login.";
    } else {
        // Insert new user data into the database
        $sql = "INSERT INTO users (first_name, last_name, email, phone, password) 
                VALUES ('$firstName', '$lastName', '$email', '$phone', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "New user registered successfully!";
            // Redirect to the login page after successful registration
            header("Location: mainlogin.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>
