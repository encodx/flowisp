<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit;
}

// Dummy Data
$packages = [
    ['id' => 1, 'name' => 'Home 10M', 'speed' => '10 Mbps', 'price' => '500 BDT'],
    ['id' => 2, 'name' => 'Office 20M', 'speed' => '20 Mbps', 'price' => '1000 BDT'],
    ['id' => 3, 'name' => 'Corporate 50M', 'speed' => '50 Mbps', 'price' => '2500 BDT'],
];

include '../layout/header.php';
include '../layout/sidebar.php';
?>

<div class="main-content">
    <h2>Package Configuration</h2>

    <a href="#" class="add-btn">Add New Package</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Package Name</th>
                <th>Speed</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($packages as $package): ?>
            <tr>
                <td><?= $package['id'] ?></td>
                <td><?= $package['name'] ?></td>
                <td><?= $package['speed'] ?></td>
                <td><?= $package['price'] ?></td>
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
