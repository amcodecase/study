<?php
// Start session
session_start();
include('dbconn.php'); // Database connection

// Check if the login form was submitted via AJAX
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ajax'])) {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $hashedPassword = md5($password); // Hash the password

    $response = [
        'status' => 'error',
        'message' => 'Invalid credentials'
    ];

    // Prepare the query to check credentials
    $query = "SELECT id, role, first_name, last_name, student_number FROM users WHERE (email = ? OR phone = ?) AND password_hash = ?";
    if ($stmt = $mysqli->prepare($query)) {
        $stmt->bind_param('sss', $username, $username, $hashedPassword);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($userId, $role, $firstName, $lastName, $studentNumber);
            $stmt->fetch();

            // Store session variables
            $_SESSION['user_id'] = $userId;
            $_SESSION['role'] = $role;
            $_SESSION['name'] = $firstName . ' ' . $lastName; // Full name
            $_SESSION['student_number'] = $studentNumber; // Student number

            // Set student name and number (fall back values in case session is empty)
            $studentName = $_SESSION['name'] ?? 'Student';
            $studentNumber = $_SESSION['student_number'] ?? 'Student';

            // Determine redirect based on role
            $response['status'] = 'success';
            $response['message'] = 'Login successful! Redirecting...';
            $response['redirect_url'] = $role === 'student' ? 'student/index.php' :
                                        ($role === 'admin' ? 'admin/index.php' : 'super/index.php');
        }
        $stmt->close();
    } else {
        $response['message'] = 'Database error: ' . $mysqli->error;
    }

    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Portal</title>
  <link rel="icon" href="assets/img/landscape.svg" type="image/png">
  <link rel="stylesheet" href="assets/css/index.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

<div class="top-right">
  <span class="theme-toggle" onclick="toggleTheme()">🌞</span>
  <a href="help">Help</a>
  <a href="faqs">FAQs</a>
</div>

<div class="login-container">
  <img id="logoImage" src="assets/img/landscape.svg" alt="NATEC Logo">
  <h2>Login to Proceed</h2>
  <form id="loginForm" onsubmit="return handleLogin(event)">
    <div class="form-group">
      <input type="text" id="username" name="username" placeholder="phone or email" required>
      <img id="networkLogo" src="" alt="Network Logo" style="display: none;">
    </div>
    <div class="form-group">
      <input type="password" id="password" name="password" placeholder="password" required>
      <span class="view-password" onclick="togglePasswordVisibility()">
        <i class="fas fa-eye"></i>
      </span>
    </div>
    <div class="remember-me">
      <input type="checkbox" id="rememberMe" checked>
      <label for="rememberMe">Remember Me</label>
    </div>
    <button type="submit" class="login-btn">Login</button>
    <p class="alt">or</p>
    <!-- Google login button -->
    <div class="social-login">
      <button type="button" class="google-login-btn" onclick="googleLogin()" disabled>
        <img src="assets/img/google.svg" alt="Google Logo">
        Sign in with Google
      </button>
    </div>
    
    <div class="links">
      <a href="#">Forgot Password?</a> | <a href="register">Register</a>
    </div>
  </form>
</div>

<div class="footer">
  &copy; <span id="currentYear"></span> NATEC - Version 1.0
</div>

<script>
// Handle login form submission via AJAX
function handleLogin(event) {
    event.preventDefault(); // Prevent traditional form submission

    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    // Send AJAX request to this same file for login
    fetch('index.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `username=${encodeURIComponent(username)}&password=${encodeURIComponent(password)}&ajax=1`
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            alert(data.message);
            setTimeout(() => {
                window.location.href = data.redirect_url;
            }, 3000); // Redirect after a 3-second delay
        } else {
            alert(data.message); // Show error message
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred. Please try again.');
    });

    return false; // Prevent traditional form submission
}

// Optional: Show current year in footer
document.getElementById('currentYear').textContent = new Date().getFullYear();
</script>

</body>
</html>
