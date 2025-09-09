<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit;
}

// This page would show financial reports

include '../layout/header.php';
include '../layout/sidebar.php';
?>

<div class="main-content">
    <h2>Financial Reports</h2>
    <!-- Financial reports content goes here -->
</div>

</div><!-- closes the container div from header -->
</body>
</html>
