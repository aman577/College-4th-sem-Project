<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$service = $_POST['service'];
$date = $_POST['date'];
$time = $_POST['time'];

// Check if the selected time slot is already booked
$sql = "SELECT * FROM appointments WHERE date = ? AND time = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $date, $time);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "Time slot is already booked. Please choose another time.";
} else {
    // Insert the appointment
    $sql = "INSERT INTO appointments (name, email, phone, service, date, time) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $name, $email, $phone, $service, $date, $time);
    
    if ($stmt->execute()) {
        echo "Appointment booked successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
}

$conn->close();
?>
