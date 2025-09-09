<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit;
}

include '../layout/header.php';
include '../layout/sidebar.php';
?>

<style>
    .form-grid { display: grid; grid-template-columns: 1fr; grid-gap: 1rem; }
    .form-group { display: flex; flex-direction: column; }
    .form-group label { margin-bottom: 0.5rem; font-weight: bold; }
    .form-group input { padding: 0.75rem; border: 1px solid #ccc; border-radius: 4px; }
    .form-actions { text-align: right; margin-top: 1rem; }
    .submit-btn { background-color: #007bff; color: white; padding: 0.75rem 1.5rem; border: none; border-radius: 5px; cursor: pointer; }
</style>

<div class="main-content">
    <h2>Add New Attendance Device</h2>

    <form action="create_device.php" method="post">
        <div class="form-grid">
            <div class="form-group">
                <label for="name">Device Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="ip_address">IP Address</label>
                <input type="text" id="ip_address" name="ip_address" required>
            </div>
             <div class="form-group">
                <label for="port">Port</label>
                <input type="text" id="port" name="port" value="4370" required>
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="submit-btn">Add Device</button>
        </div>
    </form>
</div>

</div><!-- closes the container div from header -->
</body>
</html>
