<?php
// Include the database connection
include('dbconn.php');

// Enable error reporting for development (disable on production)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Initialize message variable
$message = '';
$messageType = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form inputs
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $nrc = trim($_POST['nrc']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // Basic validation
    if ($password !== $confirmPassword) {
        $message = 'Passwords do not match!';
        $messageType = 'error';
    } else {
        // Check if the email, phone, or NRC already exists in the database
        $checkQuery = "SELECT * FROM users WHERE email = ? OR phone = ? OR nrc = ?";
        if ($stmt = $mysqli->prepare($checkQuery)) {
            $stmt->bind_param('sss', $email, $phone, $nrc);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                // Duplicate found
                $message = 'Email, Phone Number, or NRC already exists!';
                $messageType = 'error';
            } else {
                // Create a password hash using MD5
                $hashedPassword = md5($password);  // Using MD5 (note: insecure for real applications)

                // Insert data into the database
                $insertQuery = "INSERT INTO users (first_name, last_name, email, phone, nrc, password_hash) 
                                VALUES (?, ?, ?, ?, ?, ?)";
                
                if ($stmt = $mysqli->prepare($insertQuery)) {
                    $stmt->bind_param('ssssss', $firstName, $lastName, $email, $phone, $nrc, $hashedPassword);
                    $stmt->execute();
                    
                    // Success message
                    $message = 'Registration successful! You can now log in.';
                    $messageType = 'success';
                    
                    // Redirect to the login page after successful registration (PRG pattern)
                    header('Location: index.php');
                    exit();  // Make sure to exit after redirect
                } else {
                    $message = 'Error inserting data: ' . $mysqli->error;
                    $messageType = 'error';
                }
            }

            $stmt->close();
        } else {
            $message = 'Database error: ' . $mysqli->error;
            $messageType = 'error';
        }
    }
}
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register - Portal</title>
  <link rel="icon" href="assets/img/landscape.svg" type="image/png">
  <link rel="stylesheet" href="assets/css/register.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <script>
    let countdown = 3;

    function startCountdown() {
      const countdownElement = document.getElementById('countdown');
      const interval = setInterval(() => {
        countdownElement.innerText = 'Redirecting in ' + countdown + ' seconds...';
        countdown--;

        if (countdown < 0) {
          clearInterval(interval);
          window.location.href = 'index.php'; // Redirect to the login page
        }
      }, 1000);
    }

    window.onload = function() {
      <?php if ($messageType == 'success'): ?>
        startCountdown(); // Start countdown if registration was successful
      <?php endif; ?>
    };
  </script>
</head>
<body>
<div class="register-container">
  <img src="assets/img/landscape.svg" alt="NATEC Logo">
  <h2>Create Your Account</h2>
  
  <?php if ($message): ?>
    <div class="message <?php echo $messageType; ?>">
      <?php echo $message; ?>
    </div>
    <!-- Countdown message -->
    <?php if ($messageType == 'success'): ?>
      <div id="countdown" class="countdown-message"></div>
    <?php endif; ?>
  <?php endif; ?>
  
  <form id="registerForm" method="POST" action="register.php">
    <div class="name-container">
      <div class="form-group">
        <input type="text" name="firstName" id="firstName" placeholder="First Name" required>
      </div>
      <div class="form-group">
        <input type="text" name="lastName" id="lastName" placeholder="Last Name" required>
      </div>
    </div>
    <div class="form-group">
      <input type="email" name="email" id="email" placeholder="Email Address" required>
      <div id="emailError" class="error-message"></div>
    </div>
    <div class="form-group">
      <input type="tel" name="phone" id="phone" placeholder="Phone Number" required>
      <img id="networkLogo" src="" alt="Network Logo" style="display: none;">
    </div>
    <div class="form-group">
      <input type="tel" name="nrc" id="nrc" placeholder="NRC Number" required maxlength="14">
      <div id="nrcError" class="error-message"></div>
    </div>
    <div class="form-group">
      <input type="password" name="password" id="password" placeholder="Create Password" required>
      <span class="view-password" onclick="togglePasswordVisibility()">
        <i class="fas fa-eye"></i>
      </span>
    </div>
    <div class="form-group">
      <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password" required>
      <div id="passwordError" class="error-message"></div>
    </div>
    <button type="submit" class="register-btn">Register</button>
    <div class="form-links">
      <a href="index">Already have an account? Login</a>
    </div>
  </form>
</div>
<div class="footer">
  &copy; <span id="currentYear"></span> NATEC - Version 1.0
</div>
<script src="assets/js/register.js"></script>
</body>
</html>
