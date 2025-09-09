<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit;
}

// This page would be a dashboard for various reports

include '../layout/header.php';
include '../layout/sidebar.php';
?>

<div class="main-content">
    <h2>Report Menu</h2>
    <div class="report-menu">
        <a href="/report/client_reports.php" class="sub-menu-btn">Client Reports</a>
        <a href="/report/billing_reports.php" class="sub-menu-btn">Billing Reports</a>
        <a href="/report/support_reports.php" class="sub-menu-btn">Support Reports</a>
        <a href="/report/network_reports.php" class="sub-menu-btn">Network Reports</a>
    </div>
</div>

</div><!-- closes the container div from header -->
</body>
</html>
