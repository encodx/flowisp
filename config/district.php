<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit;
}

// Dummy Data
$districts = [
    ['id' => 1, 'name' => 'Dhaka'],
    ['id' => 2, 'name' => 'Chittagong'],
    ['id' => 3, 'name' => 'Khulna'],
];

include '../layout/header.php';
include '../layout/sidebar.php';
?>

<div class="main-content">
    <div class="card">
        <div class="card-header">
            <h4>Districts</h4>
            <a href="#" class="btn btn-primary">Add New District</a>
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
                        <?php foreach ($districts as $district): ?>
                            <tr>
                                <td><?php echo $district['id']; ?></td>
                                <td><?php echo $district['name']; ?></td>
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
