<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit;
}

// This page would be a dashboard for system settings

include '../layout/header.php';
include '../layout/sidebar.php';
?>

<div class="main-content">
    <h2>System Menu</h2>
    <div class="system-menu">
        <a href="/system/user_management.php" class="sub-menu-btn">User Management</a>
        <a href="/system/settings.php" class="sub-menu-btn">System Settings</a>
        <a href="/system/db_backup.php" class="sub-menu-btn">Database Backup</a>
    </div>
</div>

</div><!-- closes the container div from header -->
</body>
</html>
