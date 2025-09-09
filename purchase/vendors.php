<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit;
}

// This page would manage vendors

include '../layout/header.php';
include '../layout/sidebar.php';
?>

<div class="main-content">
    <h2>Manage Vendors</h2>
    <!-- Vendor management content goes here -->
</div>

</div><!-- closes the container div from header -->
</body>
</html>
