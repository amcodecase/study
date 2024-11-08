<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Portal</title>
  <link rel="icon" href="assets/img/landscape.svg" type="image/png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    /* Global Theme Styles */
    :root {
      --background-color: #ffffff;
      --text-color: #333;
      --input-border: #333;
      --button-color: #0077B6;
      --button-hover-color: #0099B8;
    }
    [data-theme="dark"] {
      --background-color: #1f1f1f;
      --text-color: #e0e0e0;
      --input-border: #555;
      --button-color: #333;
      --button-hover-color: #444;
    }

    /* Base styles */
    body {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: 100vh;
      font-family: Arial, sans-serif;
      margin: 0;
      background-color: var(--background-color);
      color: var(--text-color);
      transition: background-color 0.3s, color 0.3s;
    }
    .top-right {
      position: absolute;
      top: 15px;
      right: 15px;
    }
    .top-right a, .top-right .theme-toggle {
      color: var(--text-color);
      margin-left: 10px;
      text-decoration: none;
      font-size: 14px;
      cursor: pointer;
      transition: color 0.3s;
    }
    .login-container {
      width: 100%;
      max-width: 320px;
      text-align: center;
      padding: 0;
    }
    .login-container img {
      width: 200px;
      margin-bottom: 0;
      line-height: 1;
    }
    .login-container h2 {
      margin-top: 0;
      margin-bottom: 20px;
      font-size: 24px;
      color: var(--text-color);
      font-weight: 600;
      line-height: 1;
    }
    .form-group {
      position: relative;
      margin-bottom: 15px;
    }
    .form-group input[type="text"],
    .form-group input[type="password"] {
      width: 100%;
      padding: 10px;
      border: 1px solid var(--input-border);
      border-radius: 4px;
      font-size: 16px;
      outline: none;
      box-sizing: border-box;
      color: var(--text-color);
      background-color: var(--background-color);
      transition: background-color 0.3s, color 0.3s;
    }
    .form-group img {
      position: absolute;
      right: 10px;
      top: 50%;
      transform: translateY(-50%);
      width: 24px;
      height: 24px;
      user-select: none;
    }
    .view-password {
      position: absolute;
      right: 10px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      font-size: 18px;
      color: var(--text-color);
      user-select: none;
    }
    .login-btn {
      width: 100%;
      padding: 10px;
      border: none;
      border-radius: 4px;
      font-size: 16px;
      background-color: var(--button-color);
      color: #fff;
      cursor: pointer;
      transition: background-color 0.3s ease-in-out;
    }
    .login-btn:hover {
      background-color: var(--button-hover-color);
    }
    .remember-me {
      margin-bottom: 15px;
      font-size: 14px;
      display: flex;
      align-items: center;
      justify-content: start;
    }
    .remember-me input {
      margin-right: 5px;
    }

    .social-login {
  margin-top: 15px;
  text-align: center;
}

.google-login-btn {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 100%;
  padding: 10px;
  background-color: #fff;
  border: 1px solid #ddd;
  border-radius: 4px;
  font-size: 16px;
  color: #444;
  cursor: pointer;
  transition: background-color 0.3s ease;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
}

.google-login-btn:hover {
  background-color: #f0f0f0;
}

.google-login-btn img {
  width: 18px;
  height: 18px;
  margin-right: 8px;
}


    .links {
      margin-top: 15px;
      font-size: 14px;
    }
    .links a {
      color: dodgerblue;
      text-decoration: none;
      transition: color 0.3s ease;
    }
    .links a:hover {
      color: #1e5cb8;
    }
    .footer {
      margin-top: 20px;
      font-size: 14px;
      color: #777;
    }
    
  </style>
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
  <form id="loginForm">
    <div class="form-group">
      <input type="text" id="username" placeholder="phone or email" required>
      <img id="networkLogo" src="" alt="Network Logo" style="display: none;">
    </div>
    <div class="form-group">
      <input type="password" id="password" placeholder="password" required>
      <span class="view-password" onclick="togglePasswordVisibility()">
        <i class="fas fa-eye"></i>
      </span>
    </div>
    <div class="remember-me">
      <input type="checkbox" id="rememberMe" checked>
      <label for="rememberMe">Remember Me</label>
    </div>
    <button type="submit" class="login-btn" disabled>Login</button>
    <p class="alt">or</p>
    <!-- Google login button -->
    <div class="social-login">
      <button type="button" class="google-login-btn" onclick="googleLogin()">
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
  const username = document.getElementById('username');
  const password = document.getElementById('password');
  const loginBtn = document.querySelector('.login-btn');
  const networkLogo = document.getElementById('networkLogo');
  const themeToggle = document.querySelector('.theme-toggle');
  const logoImage = document.getElementById('logoImage');
  const currentYear = new Date().getFullYear();
  document.getElementById('currentYear').textContent = currentYear;

  // Load theme on page load
  function loadTheme() {
    const theme = localStorage.getItem('theme') || 'light';
    document.documentElement.setAttribute('data-theme', theme);
    themeToggle.textContent = theme === 'dark' ? '🌙' : '🌞';
    logoImage.src = theme === 'dark' ? 'assets/img/main_bw.png' : 'assets/img/landscape.svg';
  }
  loadTheme();

  // Toggle Password Visibility
  function togglePasswordVisibility() {
    const passwordField = document.getElementById('password');
    const eyeIcon = document.querySelector('.view-password i');
    if (passwordField.type === 'password') {
      passwordField.type = 'text';
      eyeIcon.classList.replace('fa-eye', 'fa-eye-slash');
    } else {
      passwordField.type = 'password';
      eyeIcon.classList.replace('fa-eye-slash', 'fa-eye');
    }
  }

  // Enable login button when inputs are filled
  function toggleLoginButton() {
    loginBtn.disabled = !username.value || !password.value;
  }

  // Update network logo based on phone number
  function updateNetworkLogo() {
    const phoneNumber = username.value.trim();

    if (phoneNumber.length === 10 && phoneNumber[0] === '0') {
      const prefix = phoneNumber.substring(0, 3);
      if (['077', '097'].includes(prefix)) {
        networkLogo.src = 'assets/img/airtel.svg';
        networkLogo.style.display = 'inline';
      } else if (['076', '096'].includes(prefix)) {
        networkLogo.src = 'assets/img/mtn.svg';
        networkLogo.style.display = 'inline';
      } else if (['075', '095'].includes(prefix)) {
        networkLogo.src = 'assets/img/zamtel.png';
        networkLogo.style.display = 'inline';
      } else {
        networkLogo.style.display = 'none';
      }
    } else {
      networkLogo.style.display = 'none';
    }
  }

  // Toggle Theme Function
  function toggleTheme() {
    const currentTheme = document.documentElement.getAttribute('data-theme');
    const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
    document.documentElement.setAttribute('data-theme', newTheme);
    localStorage.setItem('theme', newTheme);
    themeToggle.textContent = newTheme === 'dark' ? '🌙' : '🌞';
    logoImage.src = newTheme === 'dark' ? 'assets/img/main_bw.png' : 'assets/img/landscape.svg';
  }

  // Event Listeners
  username.addEventListener('input', () => {
    toggleLoginButton();
    updateNetworkLogo();
  });
  password.addEventListener('input', toggleLoginButton);
  document.getElementById('loginForm').addEventListener('submit', (e) => e.preventDefault());
</script>

</body>
</html>
