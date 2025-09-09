<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit;
}

// This page would show billing-related reports

include '../layout/header.php';
include '../layout/sidebar.php';
?>

<div class="main-content">
    <h2>Billing Reports</h2>
    <!-- Billing reports content goes here -->
</div>

</div><!-- closes the container div from header -->
</body>
</html>
