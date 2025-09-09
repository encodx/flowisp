<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit;
}

// This page would be for system settings

include '../layout/header.php';
include '../layout/sidebar.php';
?>

<div class="main-content">
    <h2>System Settings</h2>
    <!-- System settings content goes here -->
</div>

</div><!-- closes the container div from header -->
</body>
</html>
