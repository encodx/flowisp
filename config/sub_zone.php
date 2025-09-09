<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit;
}

// Dummy Data
$sub_zones = [
    ['id' => 1, 'name' => 'Sub Zone A1', 'zone_name' => 'Zone A'],
    ['id' => 2, 'name' => 'Sub Zone A2', 'zone_name' => 'Zone A'],
    ['id' => 3, 'name' => 'Sub Zone B1', 'zone_name' => 'Zone B'],
];

include '../layout/header.php';
include '../layout/sidebar.php';
?>

<div class="main-content">
    <h2>Sub Zone Configuration</h2>

    <a href="#" class="add-btn">Add New Sub Zone</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Sub Zone Name</th>
                <th>Zone Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sub_zones as $sub_zone): ?>
            <tr>
                <td><?= $sub_zone['id'] ?></td>
                <td><?= $sub_zone['name'] ?></td>
                <td><?= $sub_zone['zone_name'] ?></td>
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
