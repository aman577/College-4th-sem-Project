<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $plan = $_POST['plan'];
    $date = $_POST['date'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'project');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO appointments (name, email, phone, plan, date) 
            VALUES ('$name', '$email', '$phone', '$plan' ,'$date')";

    if ($conn->query($sql) === TRUE) {
        echo "Registered successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>