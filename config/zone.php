<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit;
}

// Dummy Data
$zones = [
    ['id' => 1, 'name' => 'Zone A'],
    ['id' => 2, 'name' => 'Zone B'],
    ['id' => 3, 'name' => 'Zone C'],
];

include '../layout/header.php';
include '../layout/sidebar.php';
?>

<div class="main-content">
    <h2>Zone Configuration</h2>

    <a href="#" class="add-btn">Add New Zone</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Zone Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($zones as $zone): ?>
            <tr>
                <td><?= $zone['id'] ?></td>
                <td><?= $zone['name'] ?></td>
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
