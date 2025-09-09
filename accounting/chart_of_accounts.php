<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit;
}

// This page would manage the chart of accounts

include '../layout/header.php';
include '../layout/sidebar.php';
?>

<div class="main-content">
    <h2>Chart of Accounts</h2>
    <!-- Chart of accounts content goes here -->
</div>

</div><!-- closes the container div from header -->
</body>
</html>
