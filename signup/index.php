<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit;
}

// Dummy Data
$signups = [
    ['id' => 1, 'name' => 'John Doe', 'status' => 'Pending', 'date' => '2024-07-28'],
    ['id' => 2, 'name' => 'Jane Smith', 'status' => 'Approved', 'date' => '2024-07-27'],
    ['id' => 3, 'name' => 'Peter Jones', 'status' => 'Rejected', 'date' => '2024-07-26'],
];

include '../layout/header.php';
include '../layout/sidebar.php';
?>

<div class="main-content">
    <h2>SignUp List</h2>

    <a href="/signup/new.php" class="add-btn">New SignUp</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Status</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($signups as $signup): ?>
            <tr>
                <td><?= $signup['id'] ?></td>
                <td><?= $signup['name'] ?></td>
                <td><?= $signup['status'] ?></td>
                <td><?= $signup['date'] ?></td>
                <td>
                    <a href="#" class="action-btn edit-btn">View</a>
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
