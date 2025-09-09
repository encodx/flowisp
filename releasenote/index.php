<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit;
}

// This page would show the release notes

include '../layout/header.php';
include '../layout/sidebar.php';
?>

<div class="main-content">
    <h2>Release Notes</h2>
    <div class="release-notes">
        <h3>Version 1.0.0 (Current)</h3>
        <ul>
            <li>Initial release of the application.</li>
            <li>Dashboard with basic metrics.</li>
            <li>Client management functionality.</li>
            <li>Billing and invoicing system.</li>
        </ul>
    </div>
</div>

</div><!-- closes the container div from header -->
</body>
</html>
