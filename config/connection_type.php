<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit;
}

// Dummy Data
$connection_types = [
    ['id' => 1, 'name' => 'Shared'],
    ['id' => 2, 'name' => 'Dedicated'],
];

include '../layout/header.php';
include '../layout/sidebar.php';
?>

<div class="main-content">
    <h2>Connection Type Configuration</h2>

    <a href="#" class="add-btn">Add New Type</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Connection Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($connection_types as $type): ?>
            <tr>
                <td><?= $type['id'] ?></td>
                <td><?= $type['name'] ?></td>
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
