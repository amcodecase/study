<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start the session and check if the user is logged in as a student
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'student') {
    header("Location: ../index");
    exit();
}

// Retrieve session data
$studentName = $_SESSION['name'] ?? 'Student';
$studentNumber = $_SESSION['student_number'] ?? null;

// Include database connection
include('../dbconn.php');

// Query to get the student's current details, including NULL values
$query = "SELECT id, student_number, first_name, last_name, email, phone, nrc, password_hash, role FROM users WHERE student_number = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("s", $studentNumber);
$stmt->execute();
$result = $stmt->get_result();
$studentDetails = $result->fetch_assoc();
$stmt->close();

// Debugging: Check the retrieved data
// echo "<pre>";
// var_dump($studentDetails);
// echo "</pre>";

// Check if form is submitted to update details
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $nrc = $_POST['nrc'];

    // Query to update student details, excluding role and id
    $updateQuery = "UPDATE users SET first_name = ?, last_name = ?, email = ?, phone = ?, nrc = ?, updated_at = CURRENT_TIMESTAMP WHERE student_number = ?";
    if ($stmt = $mysqli->prepare($updateQuery)) {
        $stmt->bind_param("ssssss", $firstName, $lastName, $email, $phone, $nrc, $studentNumber);
        $stmt->execute();
        $stmt->close();
        $message = "Details updated successfully!";
    } else {
        $message = "Error updating details: " . $mysqli->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="css/student_dash.css">
    <link rel="stylesheet" href="../assets/css/profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
</head>
<body>

<!-- Navbar -->
<?php require "navbar.php";?>

<!-- Main Content -->
<div class="container">
    <h2>Update Your Details</h2>
    <?php if (isset($message)) { echo "<p class='alert'>$message</p>"; } ?>

    <form method="POST" action="">
        <div class="form-group">
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" value="<?= htmlspecialchars($studentDetails['first_name'] ?? ''); ?>" required>
            <i class="fas fa-pencil-alt"></i>
        </div>
        <div class="form-group">
            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" value="<?= htmlspecialchars($studentDetails['last_name'] ?? ''); ?>" required>
            <i class="fas fa-pencil-alt"></i>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($studentDetails['email'] ?? ''); ?>" required>
            <i class="fas fa-pencil-alt"></i>
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" value="<?= htmlspecialchars($studentDetails['phone'] ?? ''); ?>" required>
            <i class="fas fa-pencil-alt"></i>
        </div>
        <div class="form-group">
            <label for="nrc">NRC:</label>
            <input type="text" id="nrc" name="nrc" value="<?= htmlspecialchars($studentDetails['nrc'] ?? ''); ?>" required>
            <i class="fas fa-pencil-alt"></i>
        </div>
        <button type="submit" class="btn">Save Changes</button>
    </form>
</div>

</body>
</html>
