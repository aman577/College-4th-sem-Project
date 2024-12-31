
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dynamic Registration Form Validation</title>
  <link rel="stylesheet" href="./LoginForm.css">
</head>
 <?php 
    // session_start();
   ?>  
<body>
  <div class="form-container" id="form-container">
    <!-- yo Login Form  ho hai ta-->
    <div id="login-form-section">
      <div class="alert">
        <?php
          if(isset($_SESSION["status"])){
            echo "<h4>" .$_SESSION['status']."</h4>";
            unset( $_SESSION["status"] );
          }
        ?>
      </div>
      <h2>Login</h2>
      <form id="login-form" action="main.php" method="POST">
        <label for="login-email">Email</label>
        <input type="email" id="login-email" placeholder="Enter your email" name="email" required>
        <div id="login-email-error" class="error-message"></div>

        <label for="login-password">Password</label>
        <input type="password" id="login-password" placeholder="Enter your password" name="password" required>
        <div id="login-password-error" class="error-message"></div>

        <button name="login">Login</button>
      </form>
      <div class="switch-link">
        Don't have an account? <a id="switch-to-signup">Sign up</a>
      </div>
    </div>

    <!-- Yo chai Registration Form  hai -->
    <div id="signup-form-section" style="display: none;">
      <h2>Sign Up</h2>
      <form id="signup-form" action="db.php" method="POST">
        <label for="first-name">First Name</label>
        <input type="text" id="first-name" placeholder="Enter your first name" name="firstname" required>
        <div id="first-name-error" class="error-message"></div>

        <label for="last-name">Last Name</label>
        <input type="text" id="last-name" placeholder="Enter your last name" name="lastname" required>
        <div id="last-name-error" class="error-message"></div>

        <label for="signup-email">Email</label>
        <input type="email" id="signup-email" placeholder="Enter your email" name="email" required>
        <div id="signup-email-error" class="error-message"></div>

        <label for="signup-password">Password</label>
        <input type="password" id="signup-password" placeholder="Enter your password" name="password" required>
        <div id="signup-password-error" class="error-message"></div>

        <label for="confirm-password">Confirm Password</label>
        <input type="password" id="confirm-password" placeholder="Re-enter your password" name="confirmpassword" required>
        <div id="confirm-password-error" class="error-message"></div>

        <button name="signUp">Sign Up</button>
      </form>
      <div class="switch-link">
        Already have an account? <a id="switch-to-login">Log in</a>
      </div>
    </div>
  </div>


      <script src="./LoginForm.js"></script>
    </form>
  </div>

 
</body>
</html>
