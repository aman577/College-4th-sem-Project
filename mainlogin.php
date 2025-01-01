<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Parlor Login</title>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(to bottom right, #ffe4e1, #ff91a4);
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      color: #444;
    }

    .main-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 20px;
    }

    .form-container {
      width: 350px;
      padding: 20px 25px;
      background: #fff;
      border-radius: 15px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
      text-align: center;
    }

    .form-container h2 {
      margin-bottom: 15px;
      font-size: 1.8rem;
      color: #ff4081;
    }

    label {
      display: block;
      font-weight: bold;
      text-align: left;
      margin-bottom: 5px;
    }

    input {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ddd;
      border-radius: 8px;
      font-size: 1rem;
      transition: 0.3s;
      box-sizing: border-box;
    }

    input:focus {
      border-color: #ff4081;
      outline: none;
      box-shadow: 0 0 5px rgba(255, 64, 129, 0.5);
    }

    button {
      width: 100%;
      padding: 12px 15px;
      font-size: 1rem;
      background: #ff4081;
      border: none;
      border-radius: 8px;
      color: #fff;
      cursor: pointer;
      transition: 0.3s;
    }

    button:hover {
      background: #e03072;
    }

    .error-message {
      font-size: 0.9rem;
      color: red;
      margin-bottom: 10px;
      text-align: left;
    }

    .switch-link {
      margin-top: 15px;
    }

    .switch-link a {
      text-decoration: none;
      font-weight: bold;
      color: #ff4081;
    }

    .switch-link a:hover {
      text-decoration: underline;
    }

    /* Add some fun styling */
    .form-container::before {
      content: "";
      display: block;
      height: 5px;
      width: 50px;
      margin: 0 auto 20px;
      background: #ff4081;
      border-radius: 10px;
    }
  </style>
</head>
<body>
  <div class="main-container">
    <!-- User Login Section -->
    <div class="form-container">
      <h2>User Login</h2>
      <form id="user-login-form" action="main.php" method="POST">
        <label for="user-email">Email</label>
        <input type="email" id="user-email" name="email" placeholder="Enter your email" required>
        <div id="user-email-error" class="error-message"></div>

        <label for="user-password">Password</label>
        <input type="password" id="user-password" name="password" placeholder="Enter your password" required>
        <div id="user-password-error" class="error-message"></div>

        <button type="submit" name="login">Login</button>
      </form>
      <div class="switch-link">
        Don't have an account? <a href="user_register.htm">Sign up</a>
      </div>
    </div>

    <!-- Admin Login Section -->
    <div class="form-container">
      <h2>Admin Login</h2>
      <form id="admin-login-form" action="admin_Login_Process.php" method="POST">
        <label for="admin-username">Username</label>
        <input type="text" id="admin-username" name="username" placeholder="Enter your username" required>
        <div id="admin-username-error" class="error-message"></div>

        <label for="admin-password">Password</label>
        <input type="password" id="admin-password" name="password" placeholder="Enter your password" required>
        <div id="admin-password-error" class="error-message"></div>

        <button type="submit" name="admin-login">Login</button>
      </form>
    </div>
  </div>

  <script>
    // Regex patterns
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*(),.?":{}|<>])[A-Za-z\d!@#$%^&*(),.?":{}|<>]{8,}$/;
    const usernamePattern = /^[a-zA-Z0-9_]{3,}$/;

    // User Login Validation
    const userEmail = document.getElementById("user-email");
    const userEmailError = document.getElementById("user-email-error");
    const userPassword = document.getElementById("user-password");
    const userPasswordError = document.getElementById("user-password-error");

    userEmail.addEventListener("input", () => {
      if (emailPattern.test(userEmail.value)) {
        userEmailError.textContent = "";
      } else {
        userEmailError.textContent = "Please enter a valid email address.";
      }
    });

    userPassword.addEventListener("input", () => {
      if (passwordPattern.test(userPassword.value)) {
        userPasswordError.textContent = "";
      } else {
        userPasswordError.textContent = "Password must have at least 8 characters, including uppercase, lowercase, numbers, and special characters.";
      }
    });

    // Admin Login Validation
    const adminUsername = document.getElementById("admin-username");
    const adminUsernameError = document.getElementById("admin-username-error");
    const adminPassword = document.getElementById("admin-password");
    const adminPasswordError = document.getElementById("admin-password-error");

    adminUsername.addEventListener("input", () => {
      if (usernamePattern.test(adminUsername.value)) {
        adminUsernameError.textContent = "";
      } else {
        adminUsernameError.textContent = "Username must be at least 3 characters long and contain only letters, numbers, and underscores.";
      }
    });
  </script>
</body>
</html>
