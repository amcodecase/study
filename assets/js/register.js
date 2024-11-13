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

