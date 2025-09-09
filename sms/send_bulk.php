<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit;
}

// This page would be for sending bulk SMS

include '../layout/header.php';
include '../layout/sidebar.php';
?>

<div class="main-content">
    <h2>Send Bulk SMS</h2>
    <!-- Send bulk SMS form goes here -->
</div>

</div><!-- closes the container div from header -->
</body>
</html>
