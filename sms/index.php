<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit;
}

// This page would be a dashboard for sending SMS

include '../layout/header.php';
include '../layout/sidebar.php';
?>

<div class="main-content">
    <h2>SMS Service</h2>
    <div class="sms-menu">
        <a href="/sms/send_single.php" class="sub-menu-btn">Send Single SMS</a>
        <a href="/sms/send_bulk.php" class="sub-menu-btn">Send Bulk SMS</a>
        <a href="/sms/reports.php" class="sub-menu-btn">SMS Reports</a>
    </div>
</div>

</div><!-- closes the container div from header -->
</body>
</html>
