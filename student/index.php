<?php

error_reporting(E_ALL);            
ini_set('display_errors', 1);

// Retrieve session data
$studentName = $_SESSION['name'] ?? 'Student';
$studentNumber = $_SESSION['student_number'] ?? null;


// Start the session and check if the user is logged in as a student
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'student') {
    header("Location: ../index");
    exit();
}

// Retrieve student's name from the session
$studentName = $_SESSION['name'] ?? 'Student';

// Include database connection (adjust according to your actual db config file)
include('../dbconn.php');  // Ensure this path is correct

// Query to get the latest announcement
$query = "SELECT title, content, sender_role FROM announcements ORDER BY created_at DESC LIMIT 1";  // Assuming 'created_at' column exists
$result = mysqli_query($mysqli, $query);  // Use $mysqli here instead of $conn
$announcement = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="../assets/css/student_dash.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
</head>
<body>

<!-- Navbar -->
<?php require "navbar.php";?>

<!-- Main Content -->
<div class="main-content">
    <h1>Student Dashboard</h1>
    
    <!-- Display Latest Announcement -->
    <?php if ($announcement): ?>
        <div class="announcement">
            <h3>Latest Announcement: <?php echo htmlspecialchars($announcement['title']); ?></h3>
            <p><?php echo htmlspecialchars($announcement['content']); ?></p>
            <p class="announcement-sender">Sent by: <?php echo htmlspecialchars($announcement['sender_role']); ?></p>
        </div>
    <?php else: ?>
        <p>No announcements at the moment.</p>
    <?php endif; ?>

    <!-- Dashboard Overview Section with Icons and AOS animations -->
    <div class="dashboard-overview">
        <div class="overview-item courses-card" data-aos="fade-up">
            <i class="fas fa-book"></i>
            <h3>Your Courses</h3>
            <p>Explore the courses you're enrolled in</p>
            <a href="courses.php" class="btn">Explore Courses</a>
        </div>
        <div class="overview-item grades-card" data-aos="fade-up" data-aos-delay="200">
            <i class="fas fa-chart-line"></i>
            <h3>Your Grades</h3>
            <p>Track your academic progress</p>
            <a href="grades.php" class="btn">View Grades</a>
        </div>
        <div class="overview-item activities-card" data-aos="fade-up" data-aos-delay="400">
            <i class="fas fa-tasks"></i>
            <h3>Your Activities</h3>
            <p>Check your upcoming assignments and tasks</p>
            <a href="activities.php" class="btn">View Activities</a>
        </div>
        <div class="overview-item payments-card" data-aos="fade-up" data-aos-delay="600">
            <i class="fas fa-credit-card"></i>
            <h3>Make Payments</h3>
            <p>Pay your school fees and dues</p>
            <a href="payments.php" class="btn">Make Payment</a>
        </div>

        <!-- Second Row of Cards -->
        <div class="overview-item downloads-card" data-aos="fade-up" data-aos-delay="800">
            <i class="fas fa-download"></i>
            <h3>Downloads</h3>
            <p>Access your course materials</p>
            <a href="downloads.php" class="btn">Download Now</a>
        </div>
        <div class="overview-item extra-card" data-aos="fade-up" data-aos-delay="1000">
            <i class="fas fa-eye"></i>
            <h3>View Course</h3>
            <p>Explore the content and resources</p>
            <a href="view_course.php" class="btn">Explore Course</a>
        </div>
        <div class="overview-item message-card" data-aos="fade-up" data-aos-delay="1200">
            <i class="fas fa-envelope"></i>
            <h3>Messages</h3>
            <p>Check your inbox</p>
            <a href="messages.php" class="btn">View Messages</a>
        </div>
        <div class="overview-item support-card" data-aos="fade-up" data-aos-delay="1400">
            <i class="fas fa-life-ring"></i>
            <h3>Support</h3>
            <p>Get help with your studies</p>
            <a href="support.php" class="btn">Contact Support</a>
        </div>
    </div>
</div>

<!-- Initialize AOS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>

</body>
</html>
