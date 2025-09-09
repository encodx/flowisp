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
    <div class="card">
        <div class="card-header">
            <h4>Zones</h4>
            <a href="#" class="btn btn-primary">Add New Zone</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($zones as $zone): ?>
                            <tr>
                                <td><?php echo $zone['id']; ?></td>
                                <td><?php echo $zone['name']; ?></td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-info">Edit</a>
                                    <a href="#" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include '../layout/footer.php'; ?>
