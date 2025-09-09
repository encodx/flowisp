<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit;
}

// This page would contain payroll processing and reporting features

include '../layout/header.php';
include '../layout/sidebar.php';
?>

<div class="main-content">
    <h2>Payroll Management</h2>
    <!-- Payroll management content goes here -->
</div>

</div><!-- closes the container div from header -->
</body>
</html>
