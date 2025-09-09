<?php
session_start();
require_once '../database.php'; // Include the database connection

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit;
}

// Fetch devices from the database
try {
    $stmt = $pdo->query("SELECT id, name, ip_address, port FROM attendance_devices ORDER BY created_at DESC");
    $devices = $stmt->fetchAll();
} catch (PDOException $e) {
    $devices = [];
    $_SESSION['error'] = "Database error: Could not fetch devices.";
}

$message = $_SESSION['message'] ?? null;
$error = $_SESSION['error'] ?? null;
unset($_SESSION['message'], $_SESSION['error']);

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
                    <td><?= htmlspecialchars($device['ip_address']) ?></td>
                    <td><span class="status-online">Online</span></td> <!-- Static status -->
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
