const loginFormSection = document.getElementById("login-form-section");
const signupFormSection = document.getElementById("signup-form-section");
const switchToSignup = document.getElementById("switch-to-signup");
const switchToLogin = document.getElementById("switch-to-login");

switchToSignup.addEventListener("click", () => {
  loginFormSection.style.display = "none";
  signupFormSection.style.display = "block";
});

switchToLogin.addEventListener("click", () => {
  signupFormSection.style.display = "none";
  loginFormSection.style.display = "block";
});

const patterns = {
  name: /^[a-zA-Z]+$/,
  phone: /^[0-9]{10}$/,
  password:
    /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/,
};

// Login form validation
document.getElementById("login-form").addEventListener("input", (e) => {
  const emailField = document.getElementById("login-email");
  const passwordField = document.getElementById("login-password");
  const emailError = document.getElementById("login-email-error");
  const passwordError = document.getElementById("login-password-error");

  if (e.target === emailField && !emailField.validity.valid) {
    emailError.textContent = "Please enter a valid email address.";
  } else if (e.target === emailField) {
    emailError.textContent = "";
  }

  if (
    e.target === passwordField &&
    !patterns.password.test(passwordField.value)
  ) {
    passwordError.textContent =
      "Password must be at least 8 characters, include uppercase, lowercase, digit, and special character.";
  } else if (e.target === passwordField) {
    passwordError.textContent = "";
  }
});

// Registration form validation
document.getElementById("signup-form").addEventListener("input", (e) => {
  const errorMessages = {
    "first-name": "First name must contain only letters.",
    "last-name": "Last name must contain only letters.",
    "signup-phone": "Phone number must be 10 digits.",
    "signup-password":
      "Password must be at least 8 characters, include uppercase, lowercase, digit, and special character.",
    "confirm-password": "Passwords do not match.",
  };

  const fieldErrors = {
    "first-name": patterns.name,
    "last-name": patterns.name,
    "signup-phone": patterns.phone,
    "signup-password": patterns.password,
  };

  const errorElement = document.getElementById(`${e.target.id}-error`);
  const value = e.target.value.trim();

  if (fieldErrors[e.target.id] && !fieldErrors[e.target.id].test(value)) {
    errorElement.textContent = errorMessages[e.target.id];
  } else if (
    e.target.id === "confirm-password" &&
    value !== document.getElementById("signup-password").value
  ) {
    errorElement.textContent = errorMessages[e.target.id];
  } else {
    errorElement.textContent = "";
  }
});
