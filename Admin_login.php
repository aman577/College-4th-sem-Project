<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login</title>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(to bottom right, rgb(157, 175, 240), rgb(134, 106, 103));
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      color: #444;
    }

    .main-container {
      width: 100%;
      max-width: 400px;
      padding: 20px;
      background: #fff;
      border-radius: 15px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
      text-align: center;
    }

    .main-container h2 {
      margin-bottom: 15px;
      font-size: 1.5rem;
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
      font-size: 0.9rem;
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
  </style>
</head>
<body>
  <div class="main-container">
    <h2>Admin Login</h2>
    <form id="admin-login-form" action="admin_Login_Process.php" method="POST">
      <label for="admin-username">Username</label>
      <input type="text" id="admin-username" name="username" placeholder="Enter your username" required>

      <label for="admin-password">Password</label>
      <input type="password" id="admin-password" name="password" placeholder="Enter your password" required>

      <button type="submit" name="admin-login">Login</button>
    </form>
    <div class="switch-link">
      Back to <a href="mainlogin.php">User Login</a>
    </div>
  </div>
</body>
</html>
