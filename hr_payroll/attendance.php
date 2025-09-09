<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit;
}

// This page would contain attendance tracking and reporting features

include '../layout/header.php';
include '../layout/sidebar.php';
?>

<div class="main-content">
    <h2>Attendance Management</h2>
    <!-- Attendance management content goes here -->
</div>

</div><!-- closes the container div from header -->
</body>
</html>
