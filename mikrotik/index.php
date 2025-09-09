<?php
session_start();
require_once '../database.php'; // Include the database connection

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit;
}

// Fetch servers from the database
try {
    $stmt = $pdo->query("SELECT id, name, ip_address FROM mikrotik_servers ORDER BY created_at DESC");
    $servers = $stmt->fetchAll();
} catch (PDOException $e) {
    // If there is a database error, you might want to show a message.
    $servers = [];
    $_SESSION['error'] = "Database error: Could not fetch servers.";
}

$message = $_SESSION['message'] ?? null;
$error = $_SESSION['error'] ?? null;
unset($_SESSION['message'], $_SESSION['error']);

include '../layout/header.php';
include '../layout/sidebar.php';
?>

<div class="main-content">
    <h2>Mikrotik Server Management</h2>

    <?php if ($message): ?>
        <div class="alert alert-success"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>
    <?php if ($error): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <a href="new.php" class="add-btn">Add New Server</a>

    <h3>Server List</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Server Name</th>
                <th>IP Address</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($servers)): ?>
                <tr>
                    <td colspan="5" style="text-align:center;">No servers found. Add one to get started.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($servers as $server): ?>
                <tr>
                    <td><?= htmlspecialchars($server['id']) ?></td>
                    <td><?= htmlspecialchars($server['name']) ?></td>
                    <td><?= htmlspecialchars($server['ip_address']) ?></td>
                    <td>
                        <span class="status-online">Online</span> <!-- Status is static for now -->
                    </td>
                    <td>
                        <a href="#" class="action-btn edit-btn">Manage</a>
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
