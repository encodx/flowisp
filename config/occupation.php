<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit;
}

// Dummy Data
$occupations = [
    ['id' => 1, 'name' => 'Student'],
    ['id' => 2, 'name' => 'Service Holder'],
    ['id' => 3, 'name' => 'Businessman'],
];

include '../layout/header.php';
include '../layout/sidebar.php';
?>

<div class="main-content">
    <h2>Occupation Configuration</h2>

    <a href="#" class="add-btn">Add New Occupation</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Occupation Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($occupations as $occupation): ?>
            <tr>
                <td><?= $occupation['id'] ?></td>
                <td><?= $occupation['name'] ?></td>
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
