<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit;
}

// Dummy Data
$protocols = [
    ['id' => 1, 'name' => 'PPPoE'],
    ['id' => 2, 'name' => 'Static IP'],
];

include '../layout/header.php';
include '../layout/sidebar.php';
?>

<div class="main-content">
    <h2>Protocol Configuration</h2>

    <a href="#" class="add-btn">Add New Protocol</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Protocol Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($protocols as $protocol): ?>
            <tr>
                <td><?= $protocol['id'] ?></td>
                <td><?= $protocol['name'] ?></td>
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
