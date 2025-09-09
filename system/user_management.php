<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit;
}

// This page would be for user management

include '../layout/header.php';
include '../layout/sidebar.php';
?>

<div class="main-content">
    <h2>User Management</h2>
    <!-- User management content goes here -->
</div>

</div><!-- closes the container div from header -->
</body>
</html>
