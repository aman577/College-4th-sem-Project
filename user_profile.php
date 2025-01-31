<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if user is logged in and if `user` session is properly structured
if (!isset($_SESSION['user']) || !is_array($_SESSION['user'])) {
    header("Location: mainlogin.php");
    exit();
}

$user = $_SESSION['user'];

if (!isset($user['email'])) {
    echo "User session data is corrupted or missing.";
    exit();
}

include 'db.php';

$user_email = $user['email'];

// Validate email format before using it in a query
if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format.";
    exit();
}

// Fetch user appointments
$appointments_query = "SELECT * FROM appointments WHERE email = ?";
$stmt = $conn->prepare($appointments_query);
$stmt->bind_param("s", $user_email);
$stmt->execute();
$appointments_result = $stmt->get_result();

$appointments = [];
while ($appointment = $appointments_result->fetch_assoc()) {
    $appointments[] = $appointment;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&family=Jost:wght@300;400;500&display=swap">
    <style>
        body {
            font-family: "Jost", sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f5f2;
            color: #333;
        }

        header {
            background-color: #4c3a51;
            padding: 20px;
            text-align: center;
            color: white;
        }

        nav {
            display: flex;
            justify-content: center;
            gap: 20px;
            list-style: none;
            background-color: #4c3a51;
            padding: 20px;
            margin: 0;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-size: 1rem;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        nav a:hover {
            background-color: #6d4c71;
        }

        .profile-container {
            max-width: 600px;
            margin: 30px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .profile-container h1 {
            text-align: center;
            font-family: "Dancing Script", cursive;
            font-size: 2.5rem;
            color: #4c3a51;
        }

        .profile-container p {
            font-size: 1.1rem;
            margin: 10px 0;
            color: #555;
        }

        .profile-container button {
            display: inline-block;
            padding: 10px 15px;
            background-color: #4c3a51;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            margin-top: 10px;
        }

        .profile-container button:hover {
            background-color: #6d4c71;
        }

        /* Modal Styling */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 400px;
            text-align: center;
        }

        .modal-content h2 {
            margin-top: 0;
            color: #4c3a51;
        }

        .modal-content label {
            display: block;
            margin-top: 10px;
            text-align: left;
            color: #333;
            font-weight: bold;
        }

        .modal-content input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .modal-content button {
            margin-top: 15px;
            padding: 10px 20px;
            background-color: #4c3a51;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
        }

        .modal-content button:hover {
            background-color: #6d4c71;
        }

        .close-btn {
            background-color: #ff4c4c;
        }

        .close-btn:hover {
            background-color: #ff6666;
        }

        /* validation css */
        .error {
            color: red;
            font-size: 0.9rem;
            display: none; /* Initially hidden */
        }

        .valid {
            color: green;
            font-size: 0.9rem;
            display: none; /* Initially hidden */
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <a href="hellomain.htm">HOME</a>
            <a href="menu.php">MENU</a>
            <a href="Services.php">OUR SERVICES</a>
            <a href="about.htm">ABOUT US</a>
            <a href="contact.htm">CONTACT US</a>
        </nav>
    </header>

    <div class="profile-container">
        <h1>Welcome, <?php echo htmlspecialchars($user['first_name']); ?></h1>
        <p>Your Email: <span id="email-display"><?php echo htmlspecialchars($user['email']); ?></span></p>
        <p>Your Phone: <span id="phone-display"><?php echo isset($user['phone']) ? htmlspecialchars($user['phone']) : 'N/A'; ?></span></p>

        <!-- Display Appointment Details in separate sections -->
        <?php if (!empty($appointments)): ?>
            <h3>Your Appointments:</h3>
            <?php $appointment_count = 1; ?>
            <?php foreach ($appointments as $appointment): ?>
                <div class="appointment-section">
                    <h4>Appointment <?php echo $appointment_count; ?></h4>
                    <strong>Service:</strong> <?php echo htmlspecialchars($appointment['service']); ?><br>
                    <strong>Date:</strong> <?php echo htmlspecialchars($appointment['date']); ?><br>
                    <strong>Time:</strong> <?php echo htmlspecialchars($appointment['time']); ?><br>
                    <strong>Status:</strong> <?php echo htmlspecialchars($appointment['status']); ?><br>
                    <hr>
                </div>
                <?php $appointment_count++; ?>
            <?php endforeach; ?>
        <?php else: ?>
            <p>You don't have any appointments booked.</p>
        <?php endif; ?>
        
        <button id="edit-btn">Edit</button>
    </div>

    <!-- Modal -->
    <div class="modal" id="modal">
        <div class="modal-content">
            <h2>Edit Profile</h2>
            <label for="email">Edit Email:</label>
            <input type="text" id="email" value="<?php echo htmlspecialchars($user['email']); ?>">
            <span id="email-error" class="error">Please enter a valid email address.</span>
            <span id="email-valid" class="valid">Valid email address.</span>

            <label for="phone">Edit Phone:</label>
            <input type="text" id="phone" value="<?php echo isset($user['phone']) ? htmlspecialchars($user['phone']) : ''; ?>">
            <span id="phone-error" class="error">Phone number must start with 98, 97, or 96 and have 10 digits.</span>
            <span id="phone-valid" class="valid">Valid phone number.</span>

            <button id="save-btn">Save Changes</button>
            <button class="close-btn" id="close-btn">Cancel</button>
        </div>
    </div>

    <script>
        const editBtn = document.getElementById('edit-btn');
        const modal = document.getElementById('modal');
        const closeBtn = document.getElementById('close-btn');
        const emailDisplay = document.getElementById('email-display');
        const phoneDisplay = document.getElementById('phone-display');
        const saveBtn = document.getElementById('save-btn');

        // Open modal when 'Edit' is clicked
        editBtn.addEventListener('click', () => {
            modal.style.display = 'flex';
        });

        // Close modal when 'Cancel' is clicked
        closeBtn.addEventListener('click', () => {
            modal.style.display = 'none';
        });

        // Regex patterns for validation
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        const phonePattern = /^(98|97|96)[0-9]{8}$/;

        // Input elements for validation
        const emailInput = document.getElementById('email');
        const phoneInput = document.getElementById('phone');
        const emailError = document.getElementById('email-error');
        const emailValid = document.getElementById('email-valid');
        const phoneError = document.getElementById('phone-error');
        const phoneValid = document.getElementById('phone-valid');

        // Real-time email validation
        emailInput.addEventListener('input', () => {
            if (emailPattern.test(emailInput.value)) {
                emailValid.style.display = 'inline';
                emailError.style.display = 'none';
            } else {
                emailValid.style.display = 'none';
                emailError.style.display = 'inline';
            }
        });

        // Real-time phone validation
        phoneInput.addEventListener('input', () => {
            if (phonePattern.test(phoneInput.value)) {
                phoneValid.style.display = 'inline';
                phoneError.style.display = 'none';
            } else {
                phoneValid.style.display = 'none';
                phoneError.style.display = 'inline';
            }
        });

        // Save changes after validation
        saveBtn.addEventListener('click', () => {
    const email = emailInput.value;
    const phone = phoneInput.value;

    // Validate email and phone before submitting
    if (!emailPattern.test(email)) {
        alert("Please enter a valid email address.");
        return;
    }

    if (!phonePattern.test(phone)) {
        alert("Phone number must start with 98, 97, or 96 and have 10 digits.");
        return;
    }

    // Proceed with updating the profile
    fetch('update_profile.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `email=${encodeURIComponent(email)}&phone=${encodeURIComponent(phone)}`
    })
    .then(response => response.text())
    .then(data => {
        alert(data);  // Show server response
        emailDisplay.textContent = email;
        phoneDisplay.textContent = phone;
        modal.style.display = 'none';  // Close modal after saving changes
    })
    .catch(error => {
        console.error('Error:', error);
    });
});

    </script>
</body>
</html>
