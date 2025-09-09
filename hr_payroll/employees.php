<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit;
}

// This page would contain a more detailed employee list and management options

include '../layout/header.php';
include '../layout/sidebar.php';
?>

<div class="main-content">
    <h2>Employee Management</h2>
    <!-- Employee management content goes here -->
</div>

</div><!-- closes the container div from header -->
</body>
</html>
