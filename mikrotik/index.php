<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit;
}

// Dummy Data
$servers = [
    ['id' => 1, 'name' => 'Main Router', 'ip' => '192.168.88.1', 'status' => 'Connected'],
    ['id' => 2, 'name' => 'Zone A Router', 'ip' => '10.10.10.1', 'status' => 'Disconnected'],
    ['id' => 3, 'name' => 'Backup Router', 'ip' => '192.168.1.1', 'status' => 'Connected'],
];

include '../layout/header.php';
include '../layout/sidebar.php';
?>

<div class="main-content">
    <h2>Mikrotik Server Management</h2>

    <a href="/mikrotik/new.php" class="add-btn">Add New Server</a>

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
            <?php foreach ($servers as $server): ?>
            <tr>
                <td><?= $server['id'] ?></td>
                <td><?= $server['name'] ?></td>
                <td><?= $server['ip'] ?></td>
                <td><?= $server['status'] ?></td>
                <td>
                    <a href="#" class="action-btn edit-btn">Edit</a>
                    <a href="#" class="action-btn delete-btn">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</div><!-- closes the container div from header -->
</body>
</html>
