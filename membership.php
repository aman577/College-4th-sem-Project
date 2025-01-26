<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $plan = $_POST['plan'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'project');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert membership data
    $sql = "INSERT INTO memberships (name, email, phone, plan) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $email, $phone, $plan);

    if ($stmt->execute()) {
        echo "<script>alert('Registered successfully!');</script>";
        echo "<script>window.location.href = 'membership.htm';</script>"; // Redirect after success
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membership Registration</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Great+Vibes&family=Jost:wght@300;400;700&display=swap"
        rel="stylesheet">    <style>
        body {
            font-family: 'Jost', sans-serif;
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

        header h1 {
            font-family: 'Great Vibes', cursive;
            font-size: 3rem;
            margin: 0;
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

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .membership-intro {
            text-align: center;
            margin: 40px 0;
        }

        .membership-intro h2 {
            font-family: 'Dancing Script', cursive;
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        .membership-intro p {
            font-size: 1.2rem;
            line-height: 1.6;
        }

        .membership-plans {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            margin-top: 40px;
        }

        .plan {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            width: 30%;
            min-width: 280px;
            transition: transform 0.3s;
        }

        .plan:hover {
            transform: scale(1.05);
        }

        .plan h3 {
            font-size: 1.8rem;
            margin-bottom: 10px;
            color: #4c3a51;
        }

        .plan p {
            font-size: 1rem;
            line-height: 1.5;
            margin-bottom: 20px;
        }

        .plan button {
            background-color: #4c3a51;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .plan button:hover {
            background-color: #6d4c71;
        }

        .form-container {
            margin-top: 50px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .form-container h3 {
            font-family: 'Dancing Script', cursive;
            font-size: 2rem;
            margin-bottom: 20px;
            color: #4c3a51;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-size: 1rem;
            font-weight: bold;
            color: #333;
           

        }

        input, select {
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button.submit-btn {
            background-color: #4c3a51;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1.2rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button.submit-btn:hover {
            background-color: #6d4c71;
        }

        footer {
            background-color: #4c3a51;
            color: white;
            text-align: center;
            padding: 10px 0;
            margin-top: 40px;
        }
        /* validation style */
        .error-message {
        color: red;
        font-size: 0.9rem;
        margin-top: -5px;
        margin-bottom: 10px;
        display: block;
    }

    input, select {
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 10px;
        width: 100%;
    }

    input:focus, select:focus {
        outline: none;
        border-color: #6d4c71;
    }

    .submit-btn {
        background-color: #4c3a51;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 12px;
        font-size: 1rem;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .submit-btn:hover {
        background-color: #6d4c71;
    }
    </style>
</head>
<body>
<header>
    <nav>
        <a href="hellomain.htm">HOME</a>
        <a href="menu.htm">MENU</a>
        <a href="Services.htm">OUR SERVICES</a>
        <a href="about.htm">ABOUT US</a>
        <a href="#active">CONTACT US</a>
    </nav>
    <h1>Membership Plans</h1>
</header>

<div class="container">
    <div class="membership-intro">
        <h2>Become a Member Today!</h2>
        <p>Join XYZ's Parlor for exclusive benefits and discounts. Select a plan and register below!</p>
    </div>

    <!-- Membership Plans -->
    <div class="membership-plans">
        <div class="plan" onclick="selectPlan('Silver', 1000)">
            <h3>Silver Plan</h3>
            <p>- 10% off all services<br>- Complimentary coffee<br>- Free consultations<br><br><strong style="font-size: 20px;">RS: 1000</strong></p>
        </div>

        <div class="plan" onclick="selectPlan('Gold', 2000)">
            <h3>Gold Plan</h3>
            <p>- 20% off all services<br>- Complimentary coffee & snacks<br>- Free monthly facial<br><br><strong style="font-size: 20px;">RS: 2000</strong></p>
        </div>

        <div class="plan" onclick="selectPlan('Platinum', 5000)">
            <h3>Platinum Plan</h3>
            <p>- 30% off all services<br>- Complimentary coffee, snacks & gifts<br>- Free monthly facial & manicure<br><br><strong style="font-size: 20px;">RS: 5000</strong></p>
        </div>
    </div>

    <!-- Registration Form -->
    <div class="form-container" id="registrationForm" style="display: none;">
        <h3>Register for Membership</h3>
        <form id="membershipForm">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" placeholder="Enter your full name" value="<?php echo htmlspecialchars($_SESSION['user']['name'] ?? ''); ?>" required>
            <span id="nameError" class="error-message"></span>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" value="<?php echo htmlspecialchars($_SESSION['user']['email'] ?? ''); ?>" required>
            <span id="emailError" class="error-message"></span>

            <label for="phone">Phone</label>
            <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" value="<?php echo htmlspecialchars($_SESSION['user']['phone'] ?? ''); ?>" required>
            <span id="phoneError" class="error-message"></span>

            <label for="plan">Selected Plan</label>
            <input type="text" id="plan" name="plan" required readonly>
            
            <button type="button" id="payButton" class="submit-btn">Pay and Register</button>
        </form>
    </div>
</div>

<footer>
    <p>&copy; XYZ's. All Rights Reserved</p>
</footer>

<script src="https://khalti.com/static/khalti-checkout.js"></script>

<script>
    let selectedPlanAmount = 0;

    // Function to autofill the plan based on user selection and scroll to registration form
    function selectPlan(planName, amount) {
        document.getElementById('plan').value = planName;
        selectedPlanAmount = amount;

        // Show the registration form
        document.getElementById('registrationForm').style.display = 'block';

        // Scroll smoothly to the registration form
        document.getElementById('registrationForm').scrollIntoView({ behavior: 'smooth' });
    }

    // Real-time Validation for Name
    document.getElementById('name').addEventListener('input', function() {
        const name = this.value;
        const nameError = document.getElementById('nameError');
        const regex = /^[a-zA-Z\s]+$/; // Name should only contain letters and spaces

        if (!regex.test(name)) {
            nameError.textContent = "Name cannot contain numbers or special characters.";
        } else {
            nameError.textContent = "";
        }
    });

    // Real-time Validation for Phone Number (Nepali numbers starting with 98, 97, or 96)
    document.getElementById('phone').addEventListener('input', function() {
        const phone = this.value;
        const phoneError = document.getElementById('phoneError');
        const regex = /^(98|97|96)[0-9]{8}$/; // Validates numbers starting with 98, 97, or 96, followed by 8 digits

        if (!regex.test(phone)) {
            phoneError.textContent = "Phone number must start with 98, 97, or 96 and be 10 digits long.";
        } else {
            phoneError.textContent = "";
        }
    });

    // Real-time Validation for Email
    document.getElementById('email').addEventListener('input', function() {
        const email = this.value;
        const emailError = document.getElementById('emailError');
        const regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/; // Standard email format

        if (!regex.test(email)) {
            emailError.textContent = "Please enter a valid email address.";
        } else {
            emailError.textContent = "";
        }
    });

    // Khalti Payment Integration
    const payButton = document.getElementById('payButton');
    payButton.addEventListener('click', function () {
        // Final validation before payment
        const nameValid = document.getElementById('nameError').textContent === "";
        const phoneValid = document.getElementById('phoneError').textContent === "";
        const emailValid = document.getElementById('emailError').textContent === "";

        // Check if there are any errors
        if (!nameValid || !phoneValid || !emailValid) {
            alert("Please correct the errors before proceeding with payment.");
            return; // Stop payment process if validation fails
        }

        const email = document.getElementById('email').value;
        const phone = document.getElementById('phone').value;
        const plan = document.getElementById('plan').value;

        const config = {
            publicKey: "test_public_key_dc74b1f24d8e4265b031173dab848f6e", // Khalti Public Key
            productIdentity: plan,
            productName: plan + " Membership",
            productUrl: "test-admin.khalti.com",
            eventHandler: {
                onSuccess(payload) {
                    console.log(payload);

                    // Submit form data to PHP after successful payment
                    const form = document.getElementById('membershipForm');
                    const formData = new FormData(form);

                    fetch("membership.php", {
                        method: "POST",
                        body: formData
                    })
                        .then(response => response.text())
                        .then(data => {
                            alert("Membership registered successfully!");
                            console.log(data);
                            window.location.href = "membership.htm"; // Redirect after success
                        })
                        .catch(error => {
                            console.error("Error:", error);
                            alert("An error occurred during registration.");
                        });
                },
                onError(error) {
                    console.error(error);
                    alert("Payment failed. Please try again.");
                },
                onClose() {
                    console.log("Payment widget closed.");
                }
            },
            paymentPreference: ["KHALTI"],
        };

        const checkout = new KhaltiCheckout(config);
        checkout.show({ amount: selectedPlanAmount * 100 }); 
    });
</script>

</body>

</html>
