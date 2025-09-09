<?php
session_start();
require_once '../database.php'; // Include the database connection

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit;
}

// Fetch OLTs from the database
try {
    $stmt = $pdo->query("SELECT id, name, model, ip_address FROM olts ORDER BY created_at DESC");
    $olts = $stmt->fetchAll();
} catch (PDOException $e) {
    $olts = [];
    $_SESSION['error'] = "Database error: Could not fetch OLTs.";
}

$message = $_SESSION['message'] ?? null;
$error = $_SESSION['error'] ?? null;
unset($_SESSION['message'], $_SESSION['error']);

include '../layout/header.php';
include '../layout/sidebar.php';
?>

<div class="main-content">
    <h2>OLT Management</h2>

    <?php if ($message): ?>
        <div class="alert alert-success"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>
    <?php if ($error): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <a href="new.php" class="add-btn">Add New OLT</a>

    <h3>OLT List</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>OLT Name</th>
                <th>Model</th>
                <th>IP Address</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($olts)): ?>
                <tr>
                    <td colspan="6" style="text-align:center;">No OLT devices found. Add one to get started.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($olts as $olt): ?>
                <tr>
                    <td><?= htmlspecialchars($olt['id']) ?></td>
                    <td><?= htmlspecialchars($olt['name']) ?></td>
                    <td><?= htmlspecialchars($olt['model']) ?></td>
                    <td><?= htmlspecialchars($olt['ip_address']) ?></td>
                    <td><span class="status-online">Online</span></td> <!-- Static status -->
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
