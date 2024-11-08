<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register - Portal</title>
  <link rel="icon" href="assets/img/landscape.svg" type="image/png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    /* Existing styles */
    body {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: 100vh;
      font-family: Arial, sans-serif;
      margin: 0;
      background-color: #ffffff;
    }
    .register-container {
      width: 100%;
      max-width: 320px;
      text-align: center;
      padding: 0;
    }
    .register-container img {
      width: 200px;
      margin-bottom: 0;
      line-height: 1;
    }
    .register-container h2 {
      margin-top: 0;
      margin-bottom: 20px;
      font-size: 24px;
      color: #333;
      font-weight: 600;
      line-height: 1;
    }
    .form-group {
      position: relative;
      margin-bottom: 15px;
    }
    .form-group input[type="text"],
    .form-group input[type="email"],
    .form-group input[type="password"],
    .form-group input[type="tel"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #333;
      border-radius: 4px;
      font-size: 16px;
      outline: none;
      box-sizing: border-box;
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
      color: #333;
      user-select: none;
    }
    .register-btn {
      width: 100%;
      padding: 10px;
      border: none;
      border-radius: 4px;
      font-size: 16px;
      background-color: #0077B6;
      color: #fff;
      cursor: pointer;
      transition: background-color 0.3s ease-in-out;
    }
    .register-btn:hover {
      background-color: #0099B8;
    }
    .form-links {
      margin-top: 15px;
      font-size: 14px;
    }
    .form-links a {
      color: dodgerblue;
      text-decoration: none;
      transition: color 0.3s ease;
    }
    .form-links a:hover {
      color: #1e5cb8;
    }
    .footer {
      margin-top: 20px;
      font-size: 14px;
      color: #777;
    }
    .name-container {
      display: flex;
      justify-content: space-between;
    }
    .name-container .form-group {
      width: 48%;
    }
    .error-message {
      color: red;
      font-size: 12px;
    }
  </style>
</head>
<body>

<div class="register-container">
  <img src="assets/img/landscape.svg" alt="NATEC Logo">
  <h2>Create Your Account</h2>
  <form id="registerForm">
    <div class="name-container">
      <div class="form-group">
        <input type="text" id="firstName" placeholder="First Name" required>
      </div>
      <div class="form-group">
        <input type="text" id="lastName" placeholder="Last Name" required>
      </div>
    </div>
    <div class="form-group">
      <input type="email" id="email" placeholder="Email Address" required>
      <div id="emailError" class="error-message"></div>
    </div>
    <div class="form-group">
      <input type="tel" id="phone" placeholder="Phone Number" required>
      <img id="networkLogo" src="" alt="Network Logo" style="display: none;">
    </div>
    <div class="form-group">
      <input type="tel" id="nrc" placeholder="NRC Number" required maxlength="14">
      <div id="nrcError" class="error-message"></div>
    </div>
    <div class="form-group">
      <input type="password" id="password" placeholder="Create Password" required>
      <span class="view-password" onclick="togglePasswordVisibility()">
        <i class="fas fa-eye"></i>
      </span>
    </div>
    <div class="form-group">
      <input type="password" id="confirmPassword" placeholder="Confirm Password" required>
      <div id="passwordError" class="error-message"></div>
    </div>
    <button type="submit" class="register-btn" disabled>Register</button>
    <div class="form-links">
      <a href="index">Already have an account? Login</a>
    </div>
  </form>
</div>

<div class="footer">
  &copy; <span id="currentYear"></span> NATEC - Version 1.0
</div>

<script>
  const firstName = document.getElementById('firstName');
  const lastName = document.getElementById('lastName');
  const email = document.getElementById('email');
  const phone = document.getElementById('phone');
  const nrc = document.getElementById('nrc');
  const password = document.getElementById('password');
  const confirmPassword = document.getElementById('confirmPassword');
  const registerBtn = document.querySelector('.register-btn');
  const networkLogo = document.getElementById('networkLogo');
  const currentYear = new Date().getFullYear();
  document.getElementById('currentYear').textContent = currentYear;

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

  function toggleRegisterButton() {
    registerBtn.disabled = !firstName.value || !lastName.value || !email.value || !phone.value || !nrc.value || !password.value || !confirmPassword.value || password.value !== confirmPassword.value || !validateEmail() || !validateNRC() || !validatePassword();
  }

  function updateNetworkLogo() {
    const phoneNumber = phone.value.trim();

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

  function validateEmail() {
    const emailValue = email.value;
    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    const emailError = document.getElementById('emailError');
    if (!emailPattern.test(emailValue)) {
      emailError.textContent = 'Invalid email address format.';
      return false;
    } else {
      emailError.textContent = '';
      email.value = email.value.toLowerCase();
      return true;
    }
  }

  function validateNRC() {
    const nrcValue = nrc.value;
    const nrcPattern = /^\d{6}\/\d{2}\/\d{1}$/;
    const nrcError = document.getElementById('nrcError');
    if (!nrcPattern.test(nrcValue)) {
      nrcError.textContent = 'NRC must follow the format: 123456/78/9';
      return false;
    } else {
      nrcError.textContent = '';
      return true;
    }
  }

  function formatNRC() {
    let nrcValue = nrc.value.replace(/\D/g, ''); // Remove non-digit characters

    if (nrcValue.length > 6) nrcValue = nrcValue.slice(0, 6) + '/' + nrcValue.slice(6);
    if (nrcValue.length > 9) nrcValue = nrcValue.slice(0, 9) + '/' + nrcValue.slice(9);

    nrc.value = nrcValue;
  }

  nrc.addEventListener('input', formatNRC);

  function validatePassword() {
    const passwordValue = password.value;
    const passwordError = document.getElementById('passwordError');
    if (passwordValue !== confirmPassword.value) {
      passwordError.textContent = 'Passwords do not match.';
      return false;
    } else {
      passwordError.textContent = '';
      return true;
    }
  }

  document.getElementById('registerForm').addEventListener('input', () => {
    validateEmail();
    validateNRC();
    validatePassword();
    toggleRegisterButton();
  });

  phone.addEventListener('input', updateNetworkLogo);
</script>

</body>
</html>
