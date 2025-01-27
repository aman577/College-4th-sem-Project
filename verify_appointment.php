<?php
session_start();
include 'db.php';

if (isset($_POST['id'])) {
    $appointmentId = $_POST['id'];

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
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
        }

        header {
            background-color: #34495e;
            color: white;
            text-align: center;
            padding: 15px;
            font-size: 22px;
            font-weight: 600;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }


        .container {
            width: 100%;
            max-width: 700px;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            font-size: 24px;
            color: #333;
        }

        .appointment-details {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
        }

        .appointment-details h3 {
            margin-bottom: 15px;
            font-size: 22px;
            color: #444;
        }

        .appointment-details p {
            margin: 8px 0;
            font-size: 16px;
        }

        .appointment-details strong {
            color: #444;
        }

        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        button {
            padding: 12px 25px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }

        .verify-button {
            background-color: #4CAF50;
            color: white;
        }

        .verify-button:hover {
            background-color: #45a049;
            transform: translateY(-2px);
        }

        .reject-button {
            background-color: #f44336;
            color: white;
        }

        .reject-button:hover {
            background-color: #e53935;
            transform: translateY(-2px);
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .container {
                padding: 20px;
                margin: 20px;
            }

            .appointment-details p {
                font-size: 14px;
            }

            button {
                font-size: 14px;
                padding: 10px 20px;
            }
        }
        .hello{
            position:relative ;
            right:500px;
            
            padding: 5px 10px ;
        }
        .hello a{
            text-decoration: none;
        }
    </style>
</head>

<body>
    <header>
    <button class="hello"><a href="admin_panel.php" class="back-button">Back</a></button>

        Admin Panel - Management
    </header>
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

            <!-- Back Link -->
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