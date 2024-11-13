<?php
// Start the session
session_start();

// Destroy all session data
session_unset();
session_destroy();

// Redirect the user to the home or login page
header("Location: ../index.php");  // You can change this URL to the desired destination
exit();
?>
