<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit;
}

// Dummy Data
$clients = [
    ['id' => 1, 'name' => 'Client A', 'status' => 'Active', 'package' => 'Home 10M'],
    ['id' => 2, 'name' => 'Client B', 'status' => 'Inactive', 'package' => 'Office 20M'],
    ['id' => 3, 'name' => 'Client C', 'status' => 'Active', 'package' => 'Corporate 50M'],
];

include '../layout/header.php';
include '../layout/sidebar.php';
?>

<div class="main-content">
    <h2>Client List</h2>

    <a href="/client/new.php" class="add-btn">Add New Client</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Package</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clients as $client): ?>
            <tr>
                <td><?= $client['id'] ?></td>
                <td><?= $client['name'] ?></td>
                <td><?= $client['package'] ?></td>
                <td><?= $client['status'] ?></td>
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
