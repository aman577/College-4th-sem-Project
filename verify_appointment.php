<?php
// Start session and include database connection
session_start();
include 'db.php';

// Get the appointment ID from the POST request
if (isset($_POST['id'])) {
    $appointmentId = $_POST['id'];

    // Fetch appointment details from the database
    $query = "SELECT * FROM appointments WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $appointmentId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $appointment = $result->fetch_assoc();
    } else {
        echo "Appointment not found.";
        exit;
    }
} else {
    echo "Invalid request.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Appointment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .container {
            max-width: 600px;
            margin: auto;
        }

        .appointment-details {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .appointment-details h3 {
            margin-bottom: 10px;
        }

        .appointment-details p {
            margin: 5px 0;
        }

        .action-buttons {
            text-align: center;
        }

        button {
            padding: 10px 20px;
            margin: 5px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .verify-button {
            background-color: green;
            color: white;
        }

        .reject-button {
            background-color: red;
            color: white;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Verify Appointment</h2>
    <div class="appointment-details">
        <h3>Appointment Details</h3>
        <p><strong>ID:</strong> <?php echo htmlspecialchars($appointment['id']); ?></p>
        <p><strong>Name:</strong> <?php echo htmlspecialchars($appointment['name']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($appointment['email']); ?></p>
        <p><strong>Phone:</strong> <?php echo htmlspecialchars($appointment['phone']); ?></p>
        <p><strong>Service:</strong> <?php echo htmlspecialchars($appointment['service']); ?></p>
        <p><strong>Date:</strong> <?php echo htmlspecialchars($appointment['date']); ?></p>
        <p><strong>Time:</strong> <?php echo htmlspecialchars($appointment['time']); ?></p>
    </div>
    <div class="action-buttons">
        <!-- Mark as Verified -->
        <button class="verify-button" onclick="confirmVerification()">Verify</button>

        <!-- Reject Appointment -->
        <button class="reject-button" onclick="confirmRejection()">Reject</button>
    </div>
</div>

<script>
    // Confirmation function for the verify action
    function confirmVerification() {
        // Use alert box to ask for confirmation
        const userConfirmed = confirm('Are you sure you want to verify this appointment?');

        if (userConfirmed) {
            // If user confirms, submit the form to verify the appointment
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = 'confirm_verification.php';
            
            // Create a hidden input for the appointment ID
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'id';
            input.value = '<?php echo htmlspecialchars($appointment['id']); ?>';
            form.appendChild(input);
            
            // Append the form to the document body and submit it
            document.body.appendChild(form);
            form.submit();
        }
    }

    // Confirmation function for the reject action
    function confirmRejection() {
        // Use alert box to ask for confirmation
        const userConfirmed = confirm('Are you sure you want to reject this appointment?');

        if (userConfirmed) {
            // If user confirms, submit the form to reject the appointment
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = 'reject_appointment.php';
            
            // Create a hidden input for the appointment ID
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'id';
            input.value = '<?php echo htmlspecialchars($appointment['id']); ?>';
            form.appendChild(input);
            
            // Append the form to the document body and submit it
            document.body.appendChild(form);
            form.submit();
        }
    }
</script>

   