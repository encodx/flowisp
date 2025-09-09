<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit;
}

// This page would manage bandwidth resellers

include '../layout/header.php';
include '../layout/sidebar.php';
?>

<div class="main-content">
    <h2>Manage Resellers</h2>
    <!-- Reseller management content goes here -->
</div>

</div><!-- closes the container div from header -->
</body>
</html>
