<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit;
}

// This page would contain a form to add a new accounting transaction

include '../layout/header.php';
include '../layout/sidebar.php';
?>

<div class="main-content">
    <h2>New Accounting Transaction</h2>
    <!-- New transaction form goes here -->
</div>

</div><!-- closes the container div from header -->
</body>
</html>
