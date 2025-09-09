<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit;
}

// Dummy Data
$sub_zones = [
    ['id' => 1, 'name' => 'Sub Zone 1', 'zone' => 'Zone A'],
    ['id' => 2, 'name' => 'Sub Zone 2', 'zone' => 'Zone B'],
    ['id' => 3, 'name' => 'Sub Zone 3', 'zone' => 'Zone C'],
];

include '../layout/header.php';
include '../layout/sidebar.php';
?>

<div class="main-content">
    <div class="card">
        <div class="card-header">
            <h4>Sub Zones</h4>
            <a href="#" class="btn btn-primary">Add New Sub Zone</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Zone</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($sub_zones as $sub_zone): ?>
                            <tr>
                                <td><?php echo $sub_zone['id']; ?></td>
                                <td><?php echo $sub_zone['name']; ?></td>
                                <td><?php echo $sub_zone['zone']; ?></td>
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
