<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit;
}

include '../layout/header.php';
include '../layout/sidebar.php';
?>

<div class="main-content">
    <h2>Network Diagram</h2>

    <div class="network-diagram-container">
        <img src="../assets/images/network_diagram_placeholder.png" alt="Network Diagram">
    </div>
</div>

</div><!-- closes the container div from header -->
</body>
</html>
