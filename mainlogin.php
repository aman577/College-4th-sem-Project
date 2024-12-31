<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .form-container {
      width: 400px;
      padding: 20px;
      background: #fff;
      border-radius: 8px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 5px;
    }

    input {
      width: 100%;
      padding: 8px;
      margin-bottom: 15px;
      box-sizing: border-box;
    }

    button {
      width: 100%;
      padding: 10px;
      background: #007BFF;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    button:hover {
      background: #0056b3;
    }

    .switch-link {
      text-align: center;
      margin-top: 10px;
    }

    .switch-link a {
      color: #007BFF;
      text-decoration: none;
    }

    .switch-link a:hover {
      text-decoration: underline;
    }

    #admin{
        padding-bottom: 50px;
    }
    .maincontainer{
        display: flex;
       width: 70%;
       justify-content: space-around;
    }

  </style>
</head>
<body>
    
    <div class="maincontainer">

        
        <div class="form-container">
            <!-- User Login Section -->
            <div class="alert">
        <?php
          if(isset($_SESSION["status"])){
            echo "<h4>" .$_SESSION['status']."</h4>";
            unset( $_SESSION["status"] );
          }
        ?>
      </div>
            <h2>User Login</h2>
            <form id="login-form" action="main.php" method="POST">
                <label for="user-email">Email</label>
                <input type="email" id="user-email" name="email" placeholder="Enter your email" required>
                
                <label for="user-password">Password</label>
                <input type="password" id="user-password" name="password" placeholder="Enter your password" required>
                
                <button type="submit" name="login">Login</button>
            </form>
            
            <div class="switch-link">
                Don't have an account? <a href="user_register.htm">Sign up</a>
            </div>
            
        </div>
        
        <div class="form-container" id="admin">
            <!-- Admin Login Section -->
            <h2>Admin Login</h2>
            <form action="admin_Login_Process.php" method="POST">
                <label for="admin-username">Username</label>
                <input type="text" id="admin-username" name="username" placeholder="Enter your username" required>
                
                <label for="admin-password">Password</label>
                <input type="password" id="admin-password" name="password" placeholder="Enter your password" required>

                <button type="submit" >Login</button>
            </form>
        </div>
    </div>

    <script src="./LogiinForm.js"></script>

    </body>
    </html>
    