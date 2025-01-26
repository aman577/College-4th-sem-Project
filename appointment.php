<?php
// Start the session
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables for user data
$name = $email = $phone = "";

// Check if user is logged in and session data is available
if (isset($_SESSION['user'])) {
    // Safely retrieve the user data from the session
    $name = isset($_SESSION['user']['name']) ? $_SESSION['user']['name'] : '';
    $email = isset($_SESSION['user']['email']) ? $_SESSION['user']['email'] : '';
    $phone = isset($_SESSION['user']['phone']) ? $_SESSION['user']['phone'] : '';
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
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
        echo "<script>alert('Time slot is already booked. Please choose another time.');</script>";
    } else {
        // Insert the appointment into the database
        $sql = "INSERT INTO appointments (name, email, phone, service, date, time) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $name, $email, $phone, $service, $date, $time);
        
        if ($stmt->execute()) {
            echo "<script>alert('Appointment booked successfully!');</script>";
        } else {
            echo "Error: " . $stmt->error;
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Great+Vibes&family=Jost:wght@300;400;700&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Jost', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f5f2;
            color: #333;
        }
        .error-message {
        color: red;
        font-size: 0.9rem;
        margin-top: -10px;
        margin-bottom: 10px;
        display: block;
    }

        header {
            background-color: #4c3a51;
            padding: 20px;
            text-align: center;
        }

        nav {
            display: flex;
            justify-content: center;
            gap: 20px;
            list-style: none;
            background-color: #4c3a51;
            padding: 10px 0;
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

        .appointment-section {
            background-color: #ffffff;
            padding: 30px;
            margin: 30px auto;
            max-width: 700px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .appointment-section h2 {
            font-family: 'Dancing Script', cursive;
            font-size: 2.5rem;
            color: #4c3a51;
            text-align: center;
            margin-bottom: 20px;
        }

        .appointment-form {
            display: flex;
            flex-direction: column;
        }

        .appointment-form label {
            font-size: 1rem;
            margin-bottom: 8px;
            color: #555;
        }

        .appointment-form input,
        .appointment-form select {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .appointment-form button {
            background-color: #4c3a51;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .appointment-form button:hover {
            background-color: #6d4c71;
        }
        
    footer {
      background-color: #4c3a51;
      color: white;
      text-align: center;
      padding: 10px 0;
      margin-top: 50px;
    }

    footer p {
      margin: 0;
    }
        </style>
</head>
<body>
    <header>
        <nav>
            <li><a href="hellomain.htm">HOME</a></li>
            <li><a href="menu.htm">MENU</a></li>
            <li><a href="Services.htm">OUR SERVICES</a></li>
            <li><a href="about.htm">ABOUT US</a></li>
            <li><a href="contact.htm">CONTACT US</a></li>
        </nav>
    </header>

   <!-- Appointment Booking Section -->
   <div class="appointment-section" id="appointment">
        <h2>Book an Appointment</h2>
        <form action="appointment.php" method="POST" class="appointment-form" id="appointmentForm">
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter your full name" value="<?php echo htmlspecialchars($name); ?>" required>
            <span id="nameError" class="error-message"></span>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" value="<?php echo htmlspecialchars($email); ?>" readonly>
            <span id="emailError" class="error-message"></span>

            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" value="<?php echo htmlspecialchars($phone); ?>" readonly>
            <span id="phoneError" class="error-message"></span>

            <label for="service">Select Service:</label>
            <select id="service" name="service" required>
                <option value="facial">Facial</option>
                <option value="eyelash">Eyelash</option>
                <option value="eyebrow">Eyebrow</option>
                <option value="waxing">Waxing</option>
                <option value="nails">Nails</option>
                <option value="makeup">Make-up</option>
            </select>

            <label for="date">Preferred Date:</label>
            <input type="date" id="date" name="date" min="<?php echo date('Y-m-d'); ?>" required>
            <span id="dateError" class="error-message"></span>

            <label for="time">Preferred Time: 8AM to 8PM</label>
            <input type="time" id="time" name="time" required min="08:00" max="20:00">
            <span id="timeError" class="error-message"></span>

            <button type="submit" id="submitButton">Submit</button>
        </form>
    </div>
    
  <footer>
    <p>&copy; XYZ's. All Rights Reserved</p>
  </footer>

    <script>
        let selectedPlanAmount = 0;

        // Auto-filling the plan field based on user selection
        function selectPlan(planName, amount) {
            document.getElementById('plan').value = planName;
            selectedPlanAmount = amount;
        }

        // Real-time validation functions
        function validateName() {
            const nameField = document.getElementById("name");
            const nameError = document.getElementById("nameError");
            const name = nameField.value.trim();
    
            if (!/^[A-Za-z\s]+$/.test(name)) {
                nameError.textContent = "Name can only contain letters and spaces.";
                nameField.style.borderColor = "red";
            } else {
                nameError.textContent = "";
                nameField.style.borderColor = "green";
            }
        }

        function validateEmail() {
            const emailField = document.getElementById("email");
            const emailError = document.getElementById("emailError");
            const email = emailField.value.trim();
    
            if (!/^\S+@\S+\.\S+$/.test(email)) {
                emailError.textContent = "Please enter a valid email address.";
                emailField.style.borderColor = "red";
            } else {
                emailError.textContent = "";
                emailField.style.borderColor = "green";
            }
        }

        function validatePhone() {
            const phoneField = document.getElementById("phone");
            const phoneError = document.getElementById("phoneError");
            const phone = phoneField.value.trim();
    
            if (!/^(98|97|96)\d{8}$/.test(phone)) {
                phoneError.textContent = "Enter 10 digit numbers (starts with 98, 97, or 96).";
                phoneField.style.borderColor = "red";
            } else {
                phoneError.textContent = "";
                phoneField.style.borderColor = "green";
            }
        }

        function validateDate() {
            const dateField = document.getElementById("date");
            const dateError = document.getElementById("dateError");
            const date = dateField.value;
            const today = new Date().toISOString().split("T")[0];
    
            if (date < today) {
                dateError.textContent = "Date cannot be in the past.";
                dateField.style.borderColor = "red";
            } else {
                dateError.textContent = "";
                dateField.style.borderColor = "green";
            }
        }

        function validateTime() {
            const timeField = document.getElementById("time");
            const timeError = document.getElementById("timeError");
            const time = timeField.value;

            const now = new Date();
            const selectedDate = document.getElementById("date").value;
            const selectedTime = new Date(selectedDate + 'T' + time);

            if (selectedDate === new Date().toISOString().split('T')[0]) {
                if (selectedTime < now) {
                    timeError.textContent = "Time cannot be in the past.";
                    timeField.style.borderColor = "red";
                } else {
                    timeError.textContent = "";
                    timeField.style.borderColor = "green";
                }
            } else {
                timeError.textContent = "";
                timeField.style.borderColor = "green";
            }
        }

        // Attach event listeners for real-time validation
        document.getElementById("name").addEventListener("input", validateName);
        document.getElementById("email").addEventListener("input", validateEmail);
        document.getElementById("phone").addEventListener("input", validatePhone);
        document.getElementById("date").addEventListener("input", validateDate);
        document.getElementById("time").addEventListener("input", validateTime);

        // Final form submission check with confirmation
        document.getElementById("appointmentForm").addEventListener("submit", function(event) {
            // Run all validations before submitting
            validateName();
            validateEmail();
            validatePhone();
            validateDate();
            validateTime();

            // If there are validation errors, prevent form submission
            if (
                document.getElementById("nameError").textContent !== "" ||
                document.getElementById("emailError").textContent !== "" ||
                document.getElementById("phoneError").textContent !== "" ||
                document.getElementById("dateError").textContent !== "" ||
                document.getElementById("timeError").textContent !== ""
            ) {
                event.preventDefault();
                alert("Please fix the errors before submitting.");
            } else {
                // Ask for confirmation before submitting the form
                const confirmSubmission = confirm("Do you want to submit the appointment?");
                if (!confirmSubmission) {
                    event.preventDefault(); // Prevent form submission if the user cancels
                }
            }
        });
    </script>
</body>




</html>
