<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit;
}

// This page would contain a form to add a new purchase

include '../layout/header.php';
include '../layout/sidebar.php';
?>

<div class="main-content">
    <h2>Add New Purchase</h2>
    <!-- New purchase form goes here -->
</div>

</div><!-- closes the container div from header -->
</body>
</html>
