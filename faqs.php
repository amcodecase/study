<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FAQs - NATEC Portal</title>
  <link rel="icon" href="assets/img/landscape.svg" type="image/png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    body, html {
      margin: 0;
      padding: 0;
      overflow-x: hidden;
      width: 100%;
    }

    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      color: #333;
      box-sizing: border-box;
      overflow: hidden;
    }

    *,
    *::before,
    *::after {
      box-sizing: inherit;
    }

    header {
      background-color: #0077B6;
      color: #fff;
      display: flex;
      align-items: center;
      padding: 15px 20px;
      position: relative;
      flex-wrap: wrap;
      width: 100%;
      max-width: 100%;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .header-title {
      flex-grow: 1;
      text-align: center;
      font-size: 24px;
      margin: 0;
    }

    .back-button {
      position: absolute;
      left: 20px;
      background: none;
      border: none;
      color: #fff;
      font-size: 18px;
      cursor: pointer;
      transition: transform 0.3s;
    }

    .back-button:hover {
      transform: scale(1.1);
    }

    .faq-container {
      width: 100%;
      max-width: 800px;
      margin: 30px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 10px;
    }

    .faq-item {
      background-color: #fff;
      margin-bottom: 15px;
      padding: 20px;
      border-radius: 8px;
      transition: background-color 0.3s ease;
      width: 100%;
    }

    .faq-item:hover {
      background-color: #f1f1f1;
    }

    .faq-question {
      cursor: pointer;
      font-weight: bold;
      display: flex;
      justify-content: space-between;
      align-items: center;
      transition: color 0.3s;
      font-size: 18px;
    }

    .faq-question:hover {
      color: #0077B6;
    }

    .faq-answer {
      display: none;
      overflow: hidden;
      transition: max-height 0.4s ease, opacity 0.4s ease;
      opacity: 0;
      padding-top: 10px;
      line-height: 1.6;
    }

    .faq-answer.show {
      display: block;
      opacity: 1;
    }

    .footer {
      text-align: center;
      padding: 20px;
      font-size: 16px;
      color: #000;
    }

    .footer span {
      font-weight: bold;
    }

    @media screen and (max-width: 768px) {
      .faq-container {
        padding: 15px;
        margin: 20px;
      }

      .header-title {
        font-size: 20px;
      }

      .back-button {
        font-size: 16px;
      }

      .faq-item {
        padding: 15px;
      }

      .faq-question {
        font-size: 16px;
      }

      .faq-answer {
        padding-top: 8px;
      }

      .footer {
        font-size: 14px;
      }
    }

    @media screen and (max-width: 480px) {
      .header-title {
        font-size: 18px;
      }

      .back-button {
        font-size: 14px;
      }

      .faq-question {
        font-size: 14px;
      }

      .footer {
        font-size: 12px;
      }
    }
  </style>
</head>
<body>

<header>
  <button class="back-button" onclick="goBack()"><i class="fas fa-arrow-left"></i> Back</button>
  <h1 class="header-title">FAQs - NATEC</h1>
</header>

<div class="faq-container">

  <div class="faq-item">
    <div class="faq-question" onclick="toggleAnswer(this)">
      What is NATEC? <i class="fas fa-chevron-down"></i>
    </div>
    <div class="faq-answer">
      NATEC (Naval Technology Center) provides computer-related courses through group sessions, master classes, and more, aiming to bridge the gap in technology education.
    </div>
  </div>

  <div class="faq-item">
    <div class="faq-question" onclick="toggleAnswer(this)">
      What makes NATEC unique? <i class="fas fa-chevron-down"></i>
    </div>
    <div class="faq-answer">
      NATEC offers a hybrid learning model, blending online and offline study, emphasizing real-world skills and practical sessions.
    </div>
  </div>

  <div class="faq-item">
    <div class="faq-question" onclick="toggleAnswer(this)">
      Who can join NATEC programs? <i class="fas fa-chevron-down"></i>
    </div>
    <div class="faq-answer">
      NATEC welcomes learners from all backgrounds, from beginners to advanced, with programs tailored to various skill levels.
    </div>
  </div>

  <div class="faq-item">
    <div class="faq-question" onclick="toggleAnswer(this)">
      How can I enroll in a course at NATEC? <i class="fas fa-chevron-down"></i>
    </div>
    <div class="faq-answer">
      Enrollment is simple through our website. Choose your course, and our support team will guide you through the process.
    </div>
  </div>

  <div class="faq-item">
    <div class="faq-question" onclick="toggleAnswer(this)">
      What topics do NATEC courses cover? <i class="fas fa-chevron-down"></i>
    </div>
    <div class="faq-answer">
      We offer courses in Web Development, Data Science, Cybersecurity, AI, Machine Learning, and Digital Marketing, constantly updated to reflect market trends.
    </div>
  </div>

  <div class="faq-item">
    <div class="faq-question" onclick="toggleAnswer(this)">
      Are NATEC courses practical or theoretical? <i class="fas fa-chevron-down"></i>
    </div>
    <div class="faq-answer">
      Our courses prioritize practical experience, allowing students to apply their learning in real-world projects.
    </div>
  </div>

  <div class="faq-item">
    <div class="faq-question" onclick="toggleAnswer(this)">
      How do I contact NATEC for more information? <i class="fas fa-chevron-down"></i>
    </div>
    <div class="faq-answer">
      Visit the "Contact Us" section on our website for email and phone details to get more information or guidance.
    </div>
  </div>

</div>

<div class="footer">
  &copy; <span id="currentYear"></span> NATEC - Building Tech Talent for Tomorrow
</div>

<script>
  document.getElementById('currentYear').textContent = new Date().getFullYear();

  function toggleAnswer(questionElement) {
    const answer = questionElement.nextElementSibling;
    const icon = questionElement.querySelector('.fas');
    
    if (answer.classList.contains('show')) {
      answer.style.maxHeight = "0";
      answer.style.opacity = "0";
      answer.classList.remove('show');
    } else {
      answer.style.display = "block";
      answer.style.maxHeight = answer.scrollHeight + "px";
      answer.style.opacity = "1";
      answer.classList.add('show');
    }

    icon.classList.toggle('fa-chevron-down');
    icon.classList.toggle('fa-chevron-up');
  }

  function goBack() {
    window.history.back();
  }
</script>

</body>
</html>
