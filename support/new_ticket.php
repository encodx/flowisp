<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit;
}

// This page would contain a form to create a new support ticket

include '../layout/header.php';
include '../layout/sidebar.php';
?>

<div class="main-content">
    <h2>Create New Ticket</h2>
    <!-- New ticket form goes here -->
</div>

</div><!-- closes the container div from header -->
</body>
</html>
