<!-- Navbar -->
<nav class="navbar">
    <div class="navbar-left">
    </div>
    <div class="navbar-right">
    <span class="navbar-text"><?php echo htmlspecialchars($studentNumber ?? 'SID Not Available'); ?></span>
    <!-- Check if student number is NULL -->
        <a href="profile.php" class="nav-item<?php echo is_null($studentNumber) ? ' blink' : ''; ?>"><i class="fas fa-user"></i> Profile</a>
        <a href="settings.php" class="nav-item"><i class="fas fa-cog"></i> Settings</a>
        <a href="logout.php" class="nav-item"><i class="fas fa-sign-out-alt"></i></a>
    </div>
</nav>