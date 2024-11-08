<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FAQs - NATEC Portal</title>
  <link rel="icon" href="assets/img/landscape.svg" type="image/png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    /* Basic styles */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f9;
      color: #333;
    }

    /* Header styles */
    header {
      background-color: #0077B6;
      color: #fff;
      display: flex;
      align-items: center;
      padding: 15px 20px;
    }

    .header-title {
      flex-grow: 1;
      text-align: center;
      font-size: 22px;
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

    /* FAQ styles */
    .faq-container {
      max-width: 700px;
      margin: 30px auto;
      padding: 20px;
    }

    .faq-item {
      background-color: #fff;
      margin-bottom: 15px;
      padding: 15px 20px;
      border: 1px solid #ddd;
      border-radius: 8px;
    }

    .faq-question {
      cursor: pointer;
      font-weight: bold;
      display: flex;
      justify-content: space-between;
      align-items: center;
      transition: color 0.3s;
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

    /* Footer styles */
    .footer {
      text-align: center;
      padding: 10px;
      color: #777;
      font-size: 14px;
    }
  </style>
</head>
<body>

<!-- Header -->
<header>
<button class="back-button" onclick="goBack()"><i class="fas fa-arrow-left"></i> Back</button>

  <h1 class="header-title">Frequently Asked Questions - NATEC</h1>
</header>

<!-- FAQ Content -->
<div class="faq-container">

  <div class="faq-item">
    <div class="faq-question" onclick="toggleAnswer(this)">
      What is NATEC? <i class="fas fa-chevron-down"></i>
    </div>
    <div class="faq-answer">
      NATEC (Naval Technology Center) is an educational institution focused on computer-related courses, providing diverse learning experiences through group sessions, master classes, open lectures, private tutoring, and workshops. We aim to bridge the gap in technology education and bring high-quality learning experiences to all levels of students.
    </div>
  </div>

  <div class="faq-item">
    <div class="faq-question" onclick="toggleAnswer(this)">
      What makes NATEC unique? <i class="fas fa-chevron-down"></i>
    </div>
    <div class="faq-answer">
      NATEC stands out for its flexible, hybrid learning model that supports both online and offline study modes. We emphasize real-world skills, practical sessions, and mentor-guided classes that allow students to apply their learning immediately. We believe in "Big ideas start today," pushing students to innovate and explore.
    </div>
  </div>

  <div class="faq-item">
    <div class="faq-question" onclick="toggleAnswer(this)">
      Who can join NATEC programs? <i class="fas fa-chevron-down"></i>
    </div>
    <div class="faq-answer">
      NATEC is open to students of all backgrounds and skill levels. Whether you're a beginner or an advanced learner, our programs are designed to meet your needs. Our courses target young students, college attendees, and adult learners interested in expanding their tech skills.
    </div>
  </div>

  <div class="faq-item">
    <div class="faq-question" onclick="toggleAnswer(this)">
      How can I enroll in a course at NATEC? <i class="fas fa-chevron-down"></i>
    </div>
    <div class="faq-answer">
      You can enroll in a NATEC course by visiting our website, browsing the available courses, and selecting the one that matches your interests. Registration is straightforward, and our support team is available to assist you throughout the enrollment process.
    </div>
  </div>

  <div class="faq-item">
    <div class="faq-question" onclick="toggleAnswer(this)">
      What topics do NATEC courses cover? <i class="fas fa-chevron-down"></i>
    </div>
    <div class="faq-answer">
      NATEC offers a range of courses on topics like Web Development, Data Science, Networking, Cybersecurity, AI & Machine Learning, and Digital Marketing. Our curriculum is continuously updated to include the latest technological advancements and job market demands.
    </div>
  </div>

  <div class="faq-item">
    <div class="faq-question" onclick="toggleAnswer(this)">
      Are NATEC courses practical or theoretical? <i class="fas fa-chevron-down"></i>
    </div>
    <div class="faq-answer">
      Our courses emphasize hands-on experience, with each lesson designed to provide practical skills. You’ll work on real-world projects, engage in collaborative tasks, and apply theories directly to scenarios similar to those found in the workplace.
    </div>
  </div>

  <div class="faq-item">
    <div class="faq-question" onclick="toggleAnswer(this)">
      How do I contact NATEC for more information? <i class="fas fa-chevron-down"></i>
    </div>
    <div class="faq-answer">
      For any inquiries, please visit our "Contact Us" page on our website, where you can reach out via email or phone. We’re happy to help answer any questions or provide guidance on which course might be right for you.
    </div>
  </div>

</div>

<!-- Footer -->
<div class="footer">
  &copy; <span id="currentYear"></span> NATEC - Building Tech Talent for Tomorrow
</div>

<script>
  // Display the current year in the footer
  document.getElementById('currentYear').textContent = new Date().getFullYear();

  // Toggle FAQ answer visibility
  function toggleAnswer(questionElement) {
    const answer = questionElement.nextElementSibling;
    const icon = questionElement.querySelector('.fas');

    // Toggle answer visibility
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

    // Toggle icon direction
    icon.classList.toggle('fa-chevron-down');
    icon.classList.toggle('fa-chevron-up');
  }

    // Go back to the previous page
    function goBack() {
    window.history.back();
  }
</script>

</body>
</html>
