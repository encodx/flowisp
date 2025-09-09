<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit;
}

// Use the list from the session, or initialize it if it doesn't exist.
$devices = $_SESSION['devices'] ?? [];

$message = $_SESSION['message'] ?? null;
$error = $_SESSION['error'] ?? null;

// Clear the messages after displaying them
unset($_SESSION['message']);
unset($_SESSION['error']);

include '../layout/header.php';
include '../layout/sidebar.php';
?>

<div class="main-content">
    <h2>Attendance Device Management</h2>

    <?php if ($message): ?>
        <div class="alert alert-success"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>
    <?php if ($error): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <a href="new_device.php" class="add-btn">Add New Device</a>

    <h3>Device List</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Device Name</th>
                <th>IP Address</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($devices)): ?>
                <tr>
                    <td colspan="5" style="text-align:center;">No devices found. Add one to get started.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($devices as $device): ?>
                <tr>
                    <td><?= htmlspecialchars($device['id']) ?></td>
                    <td><?= htmlspecialchars($device['name']) ?></td>
                    <td><?= htmlspecialchars($device['ip']) ?></td>
                    <td><?= htmlspecialchars($device['status']) ?></td>
                    <td>
                        <a href="#" class="action-btn">Sync Attendance</a>
                        <a href="#" class="action-btn edit-btn">Edit</a>
                        <a href="#" class="action-btn delete-btn">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

</div><!-- closes the container div from header -->
</body>
</html>
