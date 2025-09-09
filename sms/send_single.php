<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit;
}

// This page would be for sending a single SMS

include '../layout/header.php';
include '../layout/sidebar.php';
?>

<div class="main-content">
    <h2>Send Single SMS</h2>
    <!-- Send single SMS form goes here -->
</div>

</div><!-- closes the container div from header -->
</body>
</html>
