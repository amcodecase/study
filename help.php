<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Help - NATEC Portal</title>
  <link rel="icon" href="assets/img/landscape.svg" type="image/png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    /* Basic reset and styles */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #ffffff;
      color: #333;
    }

    /* Header styles */
    header {
      background-color: #0077B6;
      color: #fff;
      display: flex;
      align-items: center;
      padding: 15px 20px;
      position: relative;
    }

    .header-title {
      flex-grow: 1;
      text-align: center;
      font-size: 22px;
      font-weight: bold;
    }

    /* Back button styles */
    .back-button {
      position: absolute;
      left: 20px;
      background: none;
      border: none;
      color: #fff;
      font-size: 18px;
      cursor: pointer;
    }

    .back-button i {
      margin-right: 5px;
    }

    /* Help container and section styles */
    .help-container {
      max-width: 700px;
      margin: 30px auto;
      padding: 20px;
      background-color: #ffffff;
    }

    .help-section {
      padding: 20px 0;
      border-bottom: 1px solid #ddd;
    }

    .help-section h3 {
      font-size: 18px;
      color: #0077B6;
      font-weight: bold;
      margin-top: 0;
    }

    .help-section p {
      line-height: 1.6;
      margin-bottom: 10px;
    }

    .help-section ul {
      list-style-type: none;
      padding: 0;
    }

    .help-section li {
      padding-left: 20px;
      position: relative;
      line-height: 1.6;
    }

    .help-section li::before {
      content: "•";
      position: absolute;
      left: 0;
      color: #0077B6;
    }

    /* Footer styles */
    .footer {
      text-align: center;
      padding: 15px;
      color: #777;
      font-size: 14px;
    }

    .footer span {
      font-weight: bold;
    }

    /* Link styles for email and phone */
    .help-section a {
      color: #0077B6;
      text-decoration: none;
      font-weight: bold;
    }

    .help-section a:hover {
      text-decoration: underline;
    }

    /* Media query for mobile responsiveness */
    @media (max-width: 600px) {
      header {
        flex-direction: column;
        align-items: center;
        text-align: center;
        padding: 10px;
      }

      .header-title {
        font-size: 18px;
        text-align: center;
      }

      .back-button {
        position: static;
        font-size: 16px;
        margin-bottom: 10px;
      }

      .help-container {
        margin: 20px;
        padding: 15px;
      }

      .help-section h3 {
        font-size: 16px;
      }

      .help-section p, .help-section li {
        font-size: 14px;
      }

      .footer {
        font-size: 12px;
        padding: 10px;
      }
    }
  </style>
</head>
<body>

<!-- Header with Back Button -->
<header>
  <button class="back-button" onclick="goBack()"><i class="fas fa-arrow-left"></i> Back</button>
  <h1 class="header-title">Help - NATEC Portal</h1>
</header>

<!-- Help Content -->
<div class="help-container">
  
  <!-- General Information Section -->
  <div class="help-section">
    <h3>About NATEC Portal</h3>
    <p>The NATEC Portal is designed to support students and staff in accessing course materials, resources, and other educational tools, offering a convenient learning experience for all users.</p>
  </div>

  <!-- Getting Started Section -->
  <div class="help-section">
    <h3>Getting Started</h3>
    <ul>
      <li>Navigate through the portal using the top menu.</li>
      <li>Log in to access courses, assignments, and resources.</li>
      <li>View enrolled courses and track your progress in "My Courses."</li>
    </ul>
  </div>

  <!-- Account Management Section -->
  <div class="help-section">
    <h3>Account Management</h3>
    <p>In "Account Settings," you can:</p>
    <ul>
      <li>Update your personal information.</li>
      <li>Change your password.</li>
      <li>Set notification preferences.</li>
    </ul>
  </div>

  <!-- Courses and Resources Section -->
  <div class="help-section">
    <h3>Courses and Resources</h3>
    <p>Access courses through the portal, each with:</p>
    <ul>
      <li>A syllabus outlining the course content.</li>
      <li>Assignments, quizzes, and resources.</li>
      <li>Support materials like slides, videos, and readings.</li>
    </ul>
  </div>

  <!-- Technical Support Section -->
  <div class="help-section">
    <h3>Technical Support</h3>
    <p>If you encounter any technical issues, reach out to NATEC support:</p>
    <ul>
      <li>Email: <a href="mailto:support@natec.icu?subject=Technical Support Request">support@natec.icu</a></li>
      <li>Phone: <a href="tel:+260762585270">+260 762 585 270</a></li>
      <li>Live chat available during business hours.</li>
    </ul>
  </div>

  <!-- FAQ Section -->
  <div class="help-section">
    <h3>Frequently Asked Questions</h3>
    <p>For quick answers, check out our <a href="faqs">FAQs page</a>.</p>
  </div>

</div>

<!-- Footer -->
<div class="footer">
  &copy; <span id="currentYear"></span> NATEC - Building Tech Talent for Tomorrow
</div>

<script>
  // Display the current year in the footer
  document.getElementById('currentYear').textContent = new Date().getFullYear();

  // Go back to the previous page
  function goBack() {
    window.history.back();
  }
</script>

</body>
</html>
