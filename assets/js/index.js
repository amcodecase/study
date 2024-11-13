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