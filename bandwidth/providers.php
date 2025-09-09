<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit;
}

// This page would manage bandwidth providers

include '../layout/header.php';
include '../layout/sidebar.php';
?>

<div class="main-content">
    <h2>Manage Providers</h2>
    <!-- Provider management content goes here -->
</div>

</div><!-- closes the container div from header -->
</body>
</html>
