<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit;
}

// This page would show a detailed list of all tickets

include '../layout/header.php';
include '../layout/sidebar.php';
?>

<div class="main-content">
    <h2>All Tickets</h2>
    <!-- Detailed ticket list content goes here -->
</div>

</div><!-- closes the container div from header -->
</body>
</html>
