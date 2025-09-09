<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit;
}

// This page would be for database backup

include '../layout/header.php';
include '../layout/sidebar.php';
?>

<div class="main-content">
    <h2>Database Backup</h2>
    <!-- Database backup content goes here -->
</div>

</div><!-- closes the container div from header -->
</body>
</html>
